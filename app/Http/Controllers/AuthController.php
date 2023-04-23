<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * Handle a login request for the application.
     *
     * @param  \App\Http\Requests\AuthRequest  $request
     */
    public function login(AuthRequest $request)
    {
        $user = User::firstWhere('email', $request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Credentials not match.'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('apiapptoken');

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken
        ], 200);
    }

    /**
     * Handle a logout request for the application.
     */
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out!'
        ]);

    }
}
