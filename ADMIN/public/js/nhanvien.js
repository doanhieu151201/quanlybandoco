var app = angular.module('myapp',['angularUtils.directives.dirPagination']);
app.controller('mycontroller',function($scope,$http)
{
    var getall ='https://localhost:44375/api/NV/getall';
    var add= 'https://localhost:44375/api/NV/add';
    var edit='https://localhost:44375/api/NV/update';
    var delet ='https://localhost:44375/api/NV/delete?id=';
    var GetByID='https://localhost:44375/api/NV/getID?id=';
$http({
    method: 'GET',
    url: getall
}).success(function(response){
 $scope.nhanviens =response;
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
            $scope.nhanvien = response;
            for (let index = 0; index <  $scope.nhanvien.length; index++) {
                $scope.nhanvien = $scope.nhanvien[index];
           
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
    $scope.nhanvien ={
        id :  $scope.nhanvien.id,
        ten_nhanvien :$scope.nhanvien.ten_nhanvien,
        gioitinh :  $scope.nhanvien.gioitinh,
        ngaysinh :  $scope.nhanvien.ngaysinh,
        quequan :  $scope.nhanvien.quequan,
        sdt :  $scope.nhanvien.sdt,
        email :  $scope.nhanvien.email,
        capbac :  $scope.nhanvien.capbac   
   }
   $http({
    method: m,
    url: urll,
    data: JSON.stringify($scope.nhanvien),
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
        data: $scope.nhanvien,
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