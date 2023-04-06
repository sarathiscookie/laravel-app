<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get(['id', 'uuid', 'role_id', 'name', 'email', 'contact_number', 'country_id', 'state_id', 'city_id', 'status']);

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'role_id' => 'numeric|min:3|max:100',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'contact_number' => 'required|string|max:25',
            'country_id' => 'numeric|min:1|max:100',
            'state_id' => 'numeric|min:1|max:100',
            'city_id' => 'numeric|min:1|max:100',
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

        $user->save();

        return response()->json([
            'message' => 'User created successfully!',
            'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->fill($request->post())->save();

        return response()->json([
            'message' => 'User updated successfully!',
            'user' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully!'
        ]);
    }
}