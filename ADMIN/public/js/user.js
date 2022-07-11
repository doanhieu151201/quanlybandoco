var app = angular.module('myapp',['angularUtils.directives.dirPagination']);
app.controller('mycontroller',function($scope,$http)
{
    var getall ='https://localhost:44375/api/USER/getall';
    var add= 'https://localhost:44375/api/USER/add';
    var edit='https://localhost:44375/api/USER/update';
    var delet ='https://localhost:44375/api/USER/delete?id=';
    var GetByID='https://localhost:44375/api/USER/getID?id=';
$http({
    method: 'GET',
    url: getall
}).success(function(response){
 $scope.users =response;
})
$scope.editClick = function(id) {
    $scope.id = id;
    if (id == 0) {
        $scope.modalTitle = "Them moi ban tin";
        
    } else {

        $http({
            Method: "GET",
            url: GetByID + id
        }).success(function(response) {
            $scope.user = response;
            for (let index = 0; index <  $scope.user.length; index++) {
                $scope.user = $scope.user[index];
           
            }
           
        });
        $scope.modalTitle = "Sua ban tin";
    }
    $('#modelId').modal('show');
}
$scope.currentPage = 1;
$scope.pageChangeHandler = function(num) {
        $scope.currentPage = num;
    };
$scope.pageSize = 3;
$scope.updateData = function() {
    var m = $scope.id==0?"POST":"PUT";
    var urll = $scope.id ==0?add:edit;
    $scope.user ={
        id :  $scope.user.id,
        users_name :$scope.user.users_name,
        email :  $scope.user.email,
        password :  $scope.user.password,
        
   }
   $http({
    method: m,
    url: urll,
    data: JSON.stringify($scope.user),
    headers: { 'Content-Type': 'application/json' }
}).success(function(response) {
    console.log(response);
     location.reload();
});
}

$scope.deleteClickk = function(id) {
    var xacnhan = confirm("Ban co muon xoa that khong?");
    if (xacnhan) {
    $http({
        method: "DELETE",
        url: delet +id,
        data: $scope.user,
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