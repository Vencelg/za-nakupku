<?php

namespace App\Services\Interfaces;

use App\Models\User;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface UserServiceInterface
{
    /**
     * @param User $user
     * @return bool
     */
    public function checkIfUserIsVerified(User $user): bool;
}
