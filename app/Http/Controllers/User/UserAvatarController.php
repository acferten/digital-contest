<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Domain\User\Actions\UpdateAvatarAction;
use Domain\User\DataTransferObjects\AvatarData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserAvatarController extends Controller
{
    public function update(AvatarData $avatar): RedirectResponse
    {
        UpdateAvatarAction::execute(auth()->user(), $avatar);

        return Redirect::route('profile.card', auth()->user());
    }

    public function edit(): View
    {
        return view('profile.edit_avatar');
    }
}
