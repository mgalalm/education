<?php

namespace App\Policies;

use App\Models\Talk;
use App\Models\User;

class TalkPolicy
{
    public function view(User $user, Talk $talk): bool
    {
        return $this->isUserOwner($user, $talk);

    }

    public function edit(User $user, Talk $talk): bool
    {
        return $this->isUserOwner($user, $talk);
    }

    public function update(User $user, Talk $talk): bool
    {
        return $this->isUserOwner($user, $talk);
    }

    public function delete(User $user, Talk $talk): bool
    {
        return $this->isUserOwner($user, $talk);
    }

    private function isUserOwner(User $user, Talk $talk): bool
    {
        return $user->id === $talk->user_id;
    }
}
