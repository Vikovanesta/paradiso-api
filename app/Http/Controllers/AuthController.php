<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(AuthLoginRequest $request)
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->where('name', $validated['name'])->first();
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            throw new HttpResponseException(
                response()->json([
                    'message' => 'User not found',
                    'errors' => [
                        'message' => 'Incorrect name, email or password',
                    ]
                ], 401));
        }

        $token = $user->createToken('paradiso-token')->plainTextToken;

        return $this->success([
            'user' => new UserResource($user),
            'token' => $token
        ], 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return $this->success(null ,'Logged out', 200);
    }
}
