<?php

namespace Domain\User\Actions;

use Domain\Shared\Models\User;
use Domain\User\DataTransferObjects\ProfileSecurityData;

class UpdateSecurityDataAction
{
    public static function execute(User $user, ProfileSecurityData $data): void
    {
        $user->fill([...$data->all()]);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();
    }
}
