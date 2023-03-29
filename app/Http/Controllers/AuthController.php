<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle a login request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response()->json([
                'message' => 'Wrong Credentials!'
            ], 401);
        }

        $token = $user->createToken('apiapptoken');

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken
        ], 200);
    }

    /**
     * Handle a logout request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out!'
        ]);

    }
}
