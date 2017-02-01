<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('role')->paginate(10);
        return view('users.list', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::all();

        return view('users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $role = Role::find($request->get('role_id'));

        $userArr = [
            'first_name' => $request->get('fname'),
            'last_name' => $request->get('lname'),
            'email' => $request->get('email')
        ];

        $role->users()->create($userArr);

        return redirect('/');
    }
}
