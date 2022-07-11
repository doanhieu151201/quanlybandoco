var app = angular.module('myapp', []);
app.controller('mycontroller', function($scope, $http,$window) {
    var getall ='https://localhost:44375/api/USER/getall';
    var add= 'https://localhost:44375/api/USER/add';
    var edit='https://localhost:44375/api/USER/update';
    var delet ='https://localhost:44375/api/USER/delete?id=';
    var GetByID='https://localhost:44375/api/USER/getID?id=';
    $http({
        Method: "GET",
        url: getall
    }).success(function(response) {
        console.log(response);
        $scope.users = response;
        localStorage.setItem('user',JSON.stringify($scope.users));
    });
$scope.load=()=>{
    $http({
        Method: "GET",
        url: getall
    }).success(function(response) {
        console.log(response);
        $scope.users = response;
    });

}
    $scope.updateData = function() {
        $http({
            method: 'POST',
            url: api,
            data: $scope.user,
            headers: { 'Content-Type': 'application/json' }
        }).success(function(response) {
            console.log(response);
            alert("THÀNH CÔNG");
            $scope.load();
        });
       
    }

    $scope.userarr=[];
    $scope.login =()=>{
        var check = $scope.check($scope.username,$scope.password);
        if(check){
            console.log(check);
        sessionStorage.setItem('users',JSON.stringify(check));
        alert("Đăng nhập thành công");

        var url = "http://" + $window.location.host;
        console.log(url);
        $window.location.href = url;
        
        }
        else{
            alert("Hãy nhập đủ thông tin");
            return false;
        }
    }
    $scope.check = (user,pass)=>{
        $scope.userarr = JSON.parse(localStorage.getItem('user'));
            for(var i=0; i<$scope.userarr.length; i++){
                if($scope.userarr[i].users_name==user && $scope.userarr[i].password==pass){
                    return $scope.userarr[i];
                }
            }
            return false;
    }
    $scope.admin = ()=>{
        ($scope.username,$scope.password);
        if($scope.username=='admin' && $scope.password=='admin'){
        var url = "http://" + $window.location.host +'/Admin/product';
        $window.location.href = url;
        }
        else{
            alert("Hãy nhập đủ thông tin");
            return false;
        }
    }
       
  
});