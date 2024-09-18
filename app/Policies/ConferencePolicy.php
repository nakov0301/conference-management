<?php

namespace App\Policies;

use App\Models\Conference;
use App\Models\User;

class ConferencePolicy
{
    public function edit(User $user, Conference $conference)
    {
        return $user->id === $conference->user_id;
    }

    public function delete(User $user, Conference $conference)
    {
        return $user->id === $conference->user_id;
    }
}
