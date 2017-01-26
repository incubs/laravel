<html>
<head>
    <title>User List</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" >

</head>
<body>
<div class="container">
    <div class="row">
        <h2>User List</h2>
        <table class="table-bordered table">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>

            </tr>
            @foreach($users as $user )
                <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name}}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach

        </table>
    </div>
</div>
</body>
</html>