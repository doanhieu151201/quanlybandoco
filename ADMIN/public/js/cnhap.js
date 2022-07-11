var app = angular.module('myapp',['angularUtils.directives.dirPagination']);
app.controller('mycontroller',function($scope,$http)
{
    var getall ='https://localhost:44375/api/CTNHAP/getall';
    var getallNHAP ='https://localhost:44375/api/NHAP/getall';
    var getallSP ='https://localhost:44375/api/SP/getall';
    var add= 'https://localhost:44375/api/CTNHAP/add';
    var edit='https://localhost:44375/api/CTNHAP/update';
    var delet ='https://localhost:44375/api/CTNHAP/delete?id=';
    var GetByID='https://localhost:44375/api/CTNHAP/getID?id=';
$http({
    method: 'GET',
    url: getall
}).success(function(response){
 $scope.cbillnhaps =response;
})
$http({
    method: 'GET',
    url: getallSP
}).success(function(response){
 $scope.SPs =response;
})

$http({
    method: 'GET',
    url: getallNHAP
}).success(function(response){
 $scope.billnhaps =response;
})

$scope.editClick = function(id) {
    $scope.id = id;
    if (id == 0) {
        $scope.modalTitle = "Them moi ban tin";
        // $scope.sanpham._token = CSRF_TOKEN;
        if($scope.cbillnhap){
            delete $scope.cbillnhap;
        }
    } else {
        $http({
            Method: "GET",
          
            url: GetByID + id
        }).success(function(response) {
            $scope.cbillnhap = response;
            for (let index = 0; index <  $scope.cbillnhap.length; index++) {
                $scope.cbillnhap = $scope.cbillnhap[index];
           
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
    $scope.cbillnhap ={
        id :  $scope.cbillnhap.id,
        id_bill_nhap :$scope.cbillnhap.id_bill_nhap,
        id_sp :  $scope.cbillnhap.id_sp,
        sl :  $scope.cbillnhap.sl,
        don_vi :  $scope.cbillnhap.don_vi,
   }
   $http({
    method: m,
    url: urll,
    data: JSON.stringify($scope.cbillnhap),
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
        data: $scope.cbillnhap,
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