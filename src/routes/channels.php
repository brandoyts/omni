<?php

use App\Broadcasting\CaseChannel;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel("cases.{iop_code}", CaseChannel::class);
