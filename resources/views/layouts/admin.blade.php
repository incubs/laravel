<html>
<head>
    <title>User List</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" >

</head>
<body>
<div class="container">
    <div class="row">
        <div class="pull-right">
            Logged in as: {{ Auth::user()->first_name . " " . Auth::user()->last_name }}
            <a href="{{ route('auth.logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </div>
    <div class="row">
        @yield('content')
    </div>
</div>
</body>
</html>