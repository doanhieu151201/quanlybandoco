var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('mycontroller', function($scope, $http) {
    var getall ='https://localhost:44375/api/NHAP/getall';
    var getallNV ='https://localhost:44375/api/NV/getall';
    var getallNCC ='https://localhost:44375/api/NCC/getall';
    var add= 'https://localhost:44375/api/NHAP/add';
    var edit='https://localhost:44375/api/NHAP/update';
    var delet ='https://localhost:44375/api/NHAP/delete?id=';
    var GetByID='https://localhost:44375/api/NHAP/getID?id=';
    $http({
        Method: "GET",
        url: getall
    }).success(function(response) {
        console.log(response);
        $scope.billnhaps = response;
    });

    $http({
        Method: "GET",
        url: getallNV
    }).success(function(response) {
        console.log(response);
        $scope.nhanviens = response;
    });


    $http({
        Method: "GET",
        url: getallNCC
    }).success(function(response) {
        console.log(response);
        $scope.nccs = response;
    });



    $scope.editClick = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Them moi ban tin";
            // $scope.khach._token = CSRF_TOKEN;
            if($scope.billnhap){
                delete $scope.billnhap;
            }
        } else {
            $http({
                Method: "GET",
                url: GetByID + id
            }).success(function(response) {
                $scope.billnhap = response;
                for (let index = 0; index <  $scope.billnhap.length; index++) {
                    $scope.billnhap = $scope.billnhap[index];
               
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
    $scope.pageSize = 2;
    $scope.updateData = function() {
        var m = $scope.id==0?"POST":"PUT";
        var urll = $scope.id==0?add:edit;
        $scope.billnhap ={
            id :  $scope.billnhap.id,
            id_ncc :$scope.billnhap.id_ncc,
            id_nhanvien :  $scope.billnhap.id_nhanvien,
            date_order :  $scope.billnhap.date_order,
            tong_tien :  $scope.billnhap.tong_tien,
            thanh_toan :  $scope.billnhap.thanh_toan,
            note :  $scope.billnhap.note,     
       }
       $http({
        method: m,
        url: urll,
        data: JSON.stringify($scope.billnhap),
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
            url: delet +id,
            data: $scope.billnhap,
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