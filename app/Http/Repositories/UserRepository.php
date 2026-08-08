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
}
