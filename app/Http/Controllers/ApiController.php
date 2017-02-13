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

    public function getUser( User $user )
    {
        return $user;
    }
}
