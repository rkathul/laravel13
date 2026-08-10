<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\User\CreateUserRequest;
use App\Services\UserService;

class LoginController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function login(Request $request):JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;
            return response()->json([ 
                'message' => 'Login successful', 
                'user' => [ 'id' => $user->id, 'name' => $user->name, 'email' => $user->email ],
                'token' => $token
            ]);
        }

        return response()->json([ 
                'message' => 'Invalid User name or Password', 
        ]);

    }

    public function logout(Request $request):JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }

    public function register(CreateUserRequest $request):JsonResponse
    {
        $user = $this->userService->createUser($request->validated());
        Auth::login($user);
        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json([
            'message' => 'User created successfully',
            'user' => ['id' => $user->id, 'name' => $user->name, 'email' => $user->email],
            'token' => $token
        ]);
    }
}
