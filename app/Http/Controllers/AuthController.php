<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request...
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $validated['email'])->where('name', $validated['name'])->first();
        if (!$user) {
            return response([
                'message' => 'User not found'
            ], 404);
        }

        if (!Hash::check($validated['password'], $user->password)) {
            return response([
                'message' => 'Password not match'
            ], 401);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Logged out'
        ], 201);
    }
}
