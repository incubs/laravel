(function () {
    angular.module('lfApp',[])
        .factory('User', function ($q, $http) {

            var user = {};
            user.getUser = function () {
                return $q(function (resolve, reject) {
                    $http.get( baseUrl + "/api/users?token=86c7e471118aedbcb92cde8ba1125e17")
                        .then(function (res) {
                            resolve(res.data);
                        });
                })
            }

            user.updateUser = function ( user ) {

                return $q( function (resolve, reject) {

                    var url = ''
                    if(user.id) {
                        url = baseUrl + "/api/users/"+ user.id +"/update?token=86c7e471118aedbcb92cde8ba1125e17";
                    } else {
                        url = baseUrl + "/api/users?token=86c7e471118aedbcb92cde8ba1125e17";
                    }

                    $http.post(url,
                        {
                            first_name : user.first_name,
                            last_name : user.last_name,
                            email : user.email
                        }
                    ).then( function (res) {
                        resolve(res.data);
                    });
                })
            }

            return user;
        })
        .controller('IndexCtrl', function ($scope, User) {
            
            User.getUser().then(function (res) {
                $scope.users = res;
            })

            $scope.editUser = function (user) {
                user.original = {};
                user.original.email = user.email;
                user.original.first_name = user.first_name;
                user.original.last_name = user.last_name;
                user.editing = true;
            }

            $scope.cancelEdit = function (user) {
                user.email = user.original.email;
                user.first_name = user.original.first_name;
                user.last_name = user.original.last;
                user.editing = false;
            }

            $scope.saveUser = function (user) {
                User.updateUser(user).then(function (res) {
                    alert(res.message);
                    user.email =res.data.email;
                    user.name =res.data.name;
                    user.id =res.data.id;
                    user.editing = false;
                })

            }

            $scope.addUser = function () {

                var newUser = {
                    name : "",
                    email : "",
                    first_name : "",
                    last_name : "",
                    editing : true
                }

                $scope.users.push(newUser);
            }
        });
})();