<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepository
{
    public function getUsersQuery(): Builder
    {
        return User::query()->select(['id', 'name', 'email', 'created_at', 'updated_at']);
    }

    public function createUser(array $data): User
    {
        return User::create($data);
    }

    public function getUserById(int $id): User
    {
        return User::select(['id', 'name', 'email'])->findOrFail($id);
    }

    public function updateUser(array $data, int $id): User
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser(int $id): void
    {
        User::findOrFail($id)->delete();
    }

    public function getUsersCount(): int
    {
        return User::count();
    }
}
