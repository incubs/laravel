@extends('layouts.admin')

@section('content')
    <h2>Create User</h2>

    <form action="{{ route('users.update', $user->id) }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="">Role</label>
            <select name="role_id" class="form-control">
                @foreach( $roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">First Name</label>
            <input type="text" class="form-control" name="fname" value="{{ $user->first_name }}">
        </div>
        <div class="form-group">
            <label for="">Last Name</label>
            <input type="text" class="form-control" name="lname" value="{{ $user->last_name }}">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="text" class="form-control" name="password">
        </div>
        <div class="form-group">
            <button class="btn btn-info">Save</button>
        </div>

    </form>
@stop
