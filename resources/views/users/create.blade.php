<html>
<head>
    <title>User List</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" >
</head>
<body>
<div class="container">
    <div class="row">
        <h2>Create User</h2>

        <form action="{{ url('users') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" class="form-control" name="first_name">
            </div>
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" class="form-control" name="last_name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
              <button class="btn btn-info">Save</button>
            </div>

        </form>
    </div>
</div>
</body>
</html>