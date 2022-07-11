var app = angular.module('myapp',[]);
app.controller('mycontroller',function($scope,$http)
{
    var getall ='https://localhost:44375/api/NCC/getall';
    var add= 'https://localhost:44375/api/NCC/add';
    var edit='https://localhost:44375/api/NCC/update';
    var delet ='https://localhost:44375/api/NCC/delete?id=';
    var GetByID='https://localhost:44375/api/NCC/getID?id=';

$http({
    method: 'GET',
    url: getall
}).success(function(response){
 $scope.Nhaccs =response;
})
$scope.editClick = function(id) {
    $scope.id = id;
    if (id == 0) {
        $scope.modalTitle = "Them moi ban tin";
        // $scope.sanpham._token = CSRF_TOKEN;
        if($scope.Nhacc){
            delete $scope.Nhacc;
        }
    } else {
        $http({
            Method: "GET",
            url: GetByID + id
        }).success(function(response) {
            $scope.Nhacc = response;
            $scope.Nhacc.id =  $scope.Nhacc[0].id
            $scope.Nhacc.ten_ncc =  $scope.Nhacc[0].ten_ncc
            $scope.Nhacc.diachi_ncc =  $scope.Nhacc[0].diachi_ncc
            $scope.Nhacc.email =  $scope.Nhacc[0].email

            $scope.Nhacc.sdt =  $scope.Nhacc[0].sdt
            // $scope.sanpham._token = CSRF_TOKEN;
        });
        $scope.modalTitle = "Sua ban tin";
    }
    $('#modelId').modal('show');
}
$scope.updateData = function() {
    var m = $scope.id==0?"POST":"PUT";
    var urll = $scope.id ==0?add:edit;
    $scope.Nhacc ={
        id     :$scope.Nhacc.id,
        ten_ncc:$scope.Nhacc.ten_ncc,
        diachi_ncc:$scope.Nhacc.diachi_ncc,
        email:$scope.Nhacc.email,
        sdt:$scope.Nhacc.sdt
       }
       $http({
        method: m,
        url: urll,
        data: JSON.stringify($scope.Nhacc),
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
        data: $scope.Nhacc,
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