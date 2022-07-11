var app = angular.module('myapp', []);
app.controller('mycontroller', function($scope, $http) {
    var api ='http://127.0.0.1:8000/api/khachs/';
    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/khachs"
    }).success(function(response) {
        console.log(response);
        $scope.khachs = response;
    });
    $scope.editClick = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Them moi ban tin";
            // $scope.khach._token = CSRF_TOKEN;
            if($scope.khach){
                delete $scope.khach;
            }
        } else {
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/khachs/" + id
            }).success(function(response) {
                $scope.khach = response;
                // $scope.khach._token = CSRF_TOKEN;
            });
            $scope.modalTitle = "Sua ban tin";
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        var m = $scope.id==0?"POST":"PUT";
        var urll = $scope.id==0?api:api+$scope.id;
        $http({
            method: m,
            url: urll,
            data: $scope.khach,
            headers: { 'Content-Type': 'application/json' }
        }).success(function(response) {
            console.log(response);
            location.reload();
        });
    }
    $scope.deleteClick = function(id) {
        var xacnhan = confirm("Ban co muon xoa that khong?");
        if (xacnhan) {
        $http({
            method: "DELETE",
            url: "http://127.0.0.1:8000/api/khachs/" +id,
            data: $scope.khach,
            headers: { 'Content-Type': 'application/json' }
        }).success(function(response) {
            console.log(response);
            location.reload();
        }); 
        alert("Ban vua chon xoa id=" + id);
    } else {
        alert("Ban da huy lenh xoa");
    }
    }
});