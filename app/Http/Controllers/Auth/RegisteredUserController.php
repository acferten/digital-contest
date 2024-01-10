<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Domain\Shared\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $maxSize = 2048; //kb
        $allowedTypes = 'jpeg,jpg,png,gif';

        $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'surname' => ['nullable', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'photo' => ['nullable', 'mimes:'.$allowedTypes, 'max:'.$maxSize],
            'about_yourself' => ['nullable', 'string'],
        ]);

        $user = User::create([
            'first_name' => $request->name ?? null,
            'last_name' => $request->surname ?? null,
            'username' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_picture' => $request->hasFile('photo') ? $request->file('photo') : 'default.jpg',
            'about' => $request->about_yourself ?? null,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
