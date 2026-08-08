<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Services\UserService;

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
        $this->userService->createUser($request->all());
        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }


}
