var app = angular.module('myapp',['angularUtils.directives.dirPagination']);
app.controller('mycontroller', function($scope, $http) {
    var getall ='https://localhost:44375/api/BAN/getall';
    var getallKH ='https://localhost:44375/api/KH/getall';

    var add= 'https://localhost:44375/api/BAN/add';
    var edit='https://localhost:44375/api/BAN/update';
    var delet ='https://localhost:44375/api/BAN/delete?id=';
    var GetByID='https://localhost:44375/api/BAN/getID?id=';

    $http({
        Method: "GET",
        url: getall
    }).success(function(response) {
        console.log(response);
        $scope.billbans = response;
    });
    $http({
        Method: "GET",
        url: getallKH
    }).success(function(response) {
        console.log(response);
        $scope.khachhangs = response;
    });

    $scope.editClick = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Them moi ban tin";
            // $scope.khach._token = CSRF_TOKEN;
            if($scope.billban){
                delete $scope.billban;
            }
        } else {
            $http({
                Method: "GET",
                url: GetByID + id
            }).success(function(response) {
                $scope.billban = response;
                for (let index = 0; index < $scope.billban.length; index++) {
                    $scope.billban = $scope.billban[index];
                  
                }
                // $scope.khach._token = CSRF_TOKEN;
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
        var urll = $scope.id==0?add:edit;
        $scope.billban ={
            id :  $scope.billban.id,
            id_kh :$scope.billban.id_kh,
            name_kh :  $scope.billban.name_kh,
            date_order :  $scope.billban.date_order,
            tong_tien :  $scope.billban.tong_tien,
            payment :  $scope.billban.payment,
            note :  $scope.billban.note,
       }
       $http({
        method: m,
        url: urll,
        data: JSON.stringify($scope.billban),
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
            data: $scope.billban,
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