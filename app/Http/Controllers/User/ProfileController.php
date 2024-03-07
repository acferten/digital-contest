<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\SecurityProfileDataRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function card(Request $request): View
    {
        return view('profile.card', [
            'user' => $request->user(),
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $request->user()->save();

        return Redirect::route('profile.card')->with('success', 'Основные данные успешно обновлены');
    }

    public function security(SecurityProfileDataRequest $request): RedirectResponse
    {
        $request->user()->fill([
            'email' => $request->validated('email') ?
                $request->validated('email') : $request->user()->email,
            'password' => $request->validated('password') ?
                Hash::make($request->validated('password')) : $request->user()->password,
        ]);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.card')->with('success', 'Данные безопасности успешно обновлены');
    }

    public function works(): View
    {
        $works = auth()->user()->works;

        return view('profile.works', compact('works'));
    }

    public function payments(): View
    {
        $payments = auth()->user()->payments;

        return view('profile.payments', compact('payments'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
