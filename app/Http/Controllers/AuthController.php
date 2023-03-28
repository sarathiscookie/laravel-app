<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function register(Request $request)
    {
        $fields = $request->validate([
            'role_id' => 'numeric|min:1|max:2',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'contact_number' => 'required|string|max:25',
            'country_id' => 'numeric|min:1|max:2',
            'state_id' => 'numeric|min:1|max:2',
            'city_id' => 'numeric|min:1|max:2',
            'address' => 'required|string|max:255'
        ]);

        $user = new User;
 
        $user->role_id = $fields['role_id'];
        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->password = Hash::make($fields['password'], [
            'rounds' => 12,
        ]);
        $user->contact_number = $fields['contact_number'];
        $user->country_id = $fields['country_id'];
        $user->state_id = $fields['state_id'];
        $user->city_id = $fields['city_id'];
        $user->address = $fields['address'];
        $user->status = $fields['status'];

        $user->save();

        $token = $user->createToken('apiapptoken');

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken
        ], 201);
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
}
