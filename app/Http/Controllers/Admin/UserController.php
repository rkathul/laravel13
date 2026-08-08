<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Services\UserService;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $this->userService->createUser($request->validated());
        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function edit(int $id)
    {
        $user = $this->userService->getUserById($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        $this->userService->updateUser($request->validated(), $id);
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy(int $id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }

}
