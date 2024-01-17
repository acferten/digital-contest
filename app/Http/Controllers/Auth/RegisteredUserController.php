<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisteredUserRequest;
use App\Providers\RouteServiceProvider;
use Domain\Shared\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(RegisteredUserRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            ...$validated,
            'profile_picture' => $request->hasFile('profile_picture') ?
                $request->file('profile_picture')->storePublicly('', ['disk' => 'profile_pictures'])
            : 'default.jpg',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
