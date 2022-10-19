<?php

namespace App\Services;

use App\Exceptions\ServiceException;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface;

/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{

    /**
     * @inheritDoc
     * @throws ServiceException
     */
    public function checkIfUserIsVerified(User $user): bool
    {
        if (!$user->hasVerifiedEmail()) {
            throw new ServiceException('Email not verified', 400);
        }

        return true;
    }
}
