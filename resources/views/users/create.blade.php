@extends('layouts.admin')

@section('content')
    <h2>Create User</h2>

    <form action="{{ route('users.store') }}" method="post">
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
            <input type="text" class="form-control" name="fname" value="{{ old('fname') }}">
            @if($errors->has('fname'))
                <span class="alert-danger">{{ $errors->first('fname') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="">Last Name</label>
            <input type="text" class="form-control" name="lname" value="{{ old('lname') }}">
            @if($errors->has('lname'))
                <span class="alert-danger">{{ $errors->first('lname') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
            @if($errors->has('email'))
                <span class="alert-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="text" class="form-control" name="password">
            @if($errors->has('password'))
                <span class="alert-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-group">
            <button class="btn btn-info">Save</button>
        </div>

    </form>
@stop
