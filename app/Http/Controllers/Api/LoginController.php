<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
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
}
