<?php

namespace App\Services;

use App\Http\Repositories\UserRepository;

class UserService
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function createUser(array $data)
    {
        return $this->userRepository->createUser($data);
    }

    public function getUserById(int $id)
    {
        return $this->userRepository->getUserById($id);
    }
    public function updateUser(array $data, int $id)
    {
        return $this->userRepository->updateUser($data, $id);
    }
}
