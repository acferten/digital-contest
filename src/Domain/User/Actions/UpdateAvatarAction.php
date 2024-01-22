<?php

namespace Domain\User\Actions;

use Domain\Shared\Models\User;
use Domain\User\DataTransferObjects\AvatarData;
use Illuminate\Support\Facades\Storage;

class UpdateAvatarAction
{
    public static function execute(User $user, AvatarData $data): void
    {
        if ($user->profile_picture != 'default.jpg') {
            Storage::disk('profile_pictures')->delete($user->profile_picture);
        }

        $user->update([
            'profile_picture' => $data->avatar->storePublicly('', ['disk' => 'profile_pictures']),
        ]);
    }
}
