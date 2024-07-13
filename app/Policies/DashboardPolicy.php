<?php

namespace App\Policies;

use App\Models\User;

class DashboardPolicy
{
    /**
     * Create a new policy instance.
     */
    public function dashBoard(User $user)
    {
        return $user->is_admin;
    }
    public function __construct()
    {
    }
}
