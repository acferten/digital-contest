<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Domain\User\Actions\UpdateSecurityDataAction;
use Domain\User\DataTransferObjects\ProfileSecurityData;
use Domain\User\DataTransferObjects\ProfileUpdateData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function update(ProfileUpdateData $data): RedirectResponse
    {
        auth()->user()->update([...$data->all()]);

        return Redirect::route('profile.card')->with('success', 'Основные данные успешно обновлены');
    }

    public function security(ProfileSecurityData $data): RedirectResponse
    {
        UpdateSecurityDataAction::execute(auth()->user(), $data);

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
}
