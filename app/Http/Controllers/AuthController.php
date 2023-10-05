<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\error;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(Request $request)
    {
        // Validate the request...
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $validated['email'])->where('name', $validated['name'])->first();
        if (!$user) {

            return $this->error([],'User not found', 404);
        }

        if (!Hash::check($validated['password'], $user->password)) {
            return $this->error([],'Password not match', 401);
        }

        $token = $user->createToken('paradiso-token')->plainTextToken;

        return $this->success([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return $this->success([
            'message' => 'Logged out'
        ]);
    }
}
