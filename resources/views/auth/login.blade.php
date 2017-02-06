<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body>
<div class="container">
    <div class="row">
        @if(Session::has('message'))
            {!! Session::get('message') !!}
        @endif
        <form action="{{ url('login') }}" method="post">
            {!! csrf_field() !!}
            <h1>Login Form</h1>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="password" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-info">Login</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>