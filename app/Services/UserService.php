<?php

namespace App\Services;

use App\Http\Repositories\UserRepository;

class UserService
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }
}
