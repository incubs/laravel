<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AuthToken;
use App\Http\Requests\AddUserForm;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function listUsers()
    {
        $users = User::with('role')->latest('updated_at')->paginate(10);
        //dd($users);
        return view('users.list', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::all();

        return view('users.create', ['roles' => $roles]);
    }

    public function store(AddUserForm $request)//can data be saved throuch get method
    {
        $role = Role::find($request->get('role_id'));

        $userArr = [
            'first_name' => $request->get('fname'),
            'last_name' => $request->get('lname'),
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        $role->users()->create($userArr);

        return redirect('users/list');//users.list do not recognize
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $user = Auth::user();
            $user->createToken();
            $user->save();
            return redirect()->route('users.list');
        }

        return redirect()->back()->with('message', '<div class="alert alert-danger">Wrong Username / Password Combination</div>');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('users.edit', ['roles' => $roles, 'user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        //dd($user);
        $user->first_name = $request->get('fname');
        $userArr = [
            'last_name' => $request->get('lname'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ];
        $user->fill($userArr);
        $user->save();
        return redirect()->route('users.list');
    }

}
