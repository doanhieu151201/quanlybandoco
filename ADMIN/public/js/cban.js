var app = angular.module('myapp',['angularUtils.directives.dirPagination']);
app.controller('mycontroller',function($scope,$http)
{
    var getall ='https://localhost:44375/api/CTBAN/getall';
    var getallBAN ='https://localhost:44375/api/BAN/getall';
    var getallkh ='https://localhost:44375/api/KH/getall';


    var add= 'https://localhost:44375/api/CTBAN/add';
    var edit='https://localhost:44375/api/CTBAN/update';
    var delet ='https://localhost:44375/api/CTBAN/delete?id=';
    var GetByID='https://localhost:44375/api/CTBAN/getID?id=';
$http({
    method: 'GET',
    url: getall
}).success(function(response){
 $scope.cbillbans =response;
})

$http({
    Method: "GET",
    url: getallkh
}).success(function(response) {
    console.log(response);
    $scope.khachs = response;
});

$http({
    Method: "GET",
    url: getallBAN
}).success(function(response) {
    console.log(response);
    $scope.bans = response;
  localStorage.setItem('items',JSON.stringify($scope.bans));

});




$scope.editClick = function(id) {
    $scope.id = id;
    if (id == 0) {
        $scope.modalTitle = "Them moi ban tin";
        // $scope.sanpham._token = CSRF_TOKEN;
        if($scope.cbillban){
            delete $scope.cbillban;
        }
    } else {
        $http({
            Method: "GET",
            url: GetByID + id
        }).success(function(response) {
            $scope.cbillban = response;
            for (let index = 0; index <  $scope.cbillban.length; index++) {
                $scope.cbillban = $scope.cbillban[index];
           
            }
            // $scope.sanpham._token = CSRF_TOKEN;
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
    $scope.cbillban ={
        id :  $scope.cbillnhap.id,
        id_bill_ban :$scope.cbillnhap.id_bill_ban,
        sp :  $scope.cbillnhap.sp,
        id_kh :  $scope.cbillnhap.id_kh,
        tong :  $scope.cbillnhap.tong,
   }
   $http({
    method: m,
    url: urll,
    data: JSON.stringify($scope.cbillban),
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
        data: $scope.cbillban,
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

$scope.show = function(id) {
    $scope.arrproduct =[];
    // $scope.arrsl =[];
    // $scope.arrtong =[];
        $scope.id = id;
        $http({
            Method: "GET",
            url: GetByID+id,
        }).success(function(response) {
            $scope.cbanss = response;
            $scope.arrproduct =  $scope.cbanss.sp.split(':');
            // $scope.arrsl = $scope.cbanss.sp.split(':');
            // $scope.arrtong = $scope.cbanss.tonggia.split(':');
        });
        $('#detail_bill').modal('show');
        
    }
});