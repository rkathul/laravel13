<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Services\UserService;

class DashboardController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function index(): View
    {
        $usersCount = $this->userService->getUsersCount();
        return view('admin.dashboard')->with('usersCount', $usersCount);
    }
}
