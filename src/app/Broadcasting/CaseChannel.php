<?php

namespace App\Broadcasting;

use App\Models\CaseIop;
use App\Models\User;

class CaseChannel
{
    /**
     * Create a new channel instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     */
    public function join(User $user, string $iop_code): array|bool
    {
        return $user->iop_code === $iop_code;
    }
}
