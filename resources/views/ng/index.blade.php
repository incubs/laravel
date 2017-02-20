<html>
<head>
    <title>User List</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        var baseUrl = '{{ url('') }}';
    </script>
</head>
<body ng-app="lfApp">
<div class="container" ng-controller="IndexCtrl">
    <div class="row">
        <div class="pull-right">
            @if(Auth::check())
                Logged in as: {{ Auth::user()->first_name . " " . Auth::user()->last_name }}
            @endif
            <a href="{{ route('auth.logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </div>
    <div class="row">
        <button class="btn btn-success" ng-click="addUser()">Add User</button>
        <table class="table-bordered table">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Lasr Name</th>
                <th>Action</th>
            </tr>
            <tr ng-repeat="user in users">
                <td>@{{ user.id }}</td>
                <td>
                    @{{ user.name }}
                </td>
                <td>
                     <span ng-if="user.editing">
                        <input type="text" ng-model="user.email">
                    </span>
                    <span ng-if="!user.editing">
                        @{{ user.email }}
                    </span>
                </td>
                <td>
                     <span ng-if="user.editing">
                        <input type="text" ng-model="user.first_name">
                    </span>
                    <span ng-if="!user.editing">
                        @{{ user.first_name }}
                    </span>
                </td>
                <td>
                     <span ng-if="user.editing">
                        <input type="text" ng-model="user.last_name">
                    </span>
                    <span ng-if="!user.editing">
                        @{{ user.last_name }}
                    </span>
                </td>


                <td>
                    <button class="btn btn-info" ng-click="editUser(user)" ng-if="!user.editing">Edit</button>
                    <button class="btn btn-info" ng-click="saveUser(user)" ng-if="user.editing">Save</button>
                    <button class="btn btn-info" ng-click="cancelEdit(user)" ng-if="user.editing">Cancel</button>

                </td>
            </tr>

        </table>
    </div>
</div>
</body>
</html>