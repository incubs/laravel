<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function users()
    {
        return User::all();
    }

    public function getUser(  $user )
    {
        return User::find($user);
    }

    public function createUser( Request $request )
    {
        $user = User::create($request->all());

        return ['status' => 'success', 'message' => 'User successfully created', 'data' => $user];
    }

    public function updateUser( User $user, Request $request)
    {
        $user->update($request->all());

        return ['message' => 'User Succeffully updated','data' => $user];
    }

}
