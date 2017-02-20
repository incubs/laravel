@extends('layouts.admin')
@section('content')
    <div class="row">
        <a href="{{ route('users.create') }}" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Create User</a>
        <h2>User List</h2>
        <table class="table-bordered table">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            @foreach($users as $user )
                <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name}}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name or '' }}</td>
                    <td><a class="btn btn-info" href="{{ route('users.edit', [$user->id]) }}">Edit</a></td>
                </tr>
            @endforeach

        </table>
        {!! $users->links() !!}
    </div>
@stop