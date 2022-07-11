var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);

app.controller('mycontroller', function($scope, $http,$location) {
    var getall ='https://localhost:44375/api/SP/getall';
    var getallLSP ='https://localhost:44375/api/LSP/getall';
    var getallNew ='https://localhost:44375/api/NEWS/getall';

    
    
    $http({
        Method: "GET",
        url: getall
    }).success(function(response) {
        console.log(response);
        $scope.sanphams = response;
    });
    $http({
        Method: "GET",
        url: getallLSP
    }).success(function(response) {
        console.log(response);
        $scope.loaisps = response;
    });
    $http({
        Method: "GET",
        url: getallNew
    }).success(function(response) {
        console.log(response);
        $scope.tintucs = response;
    });




    $scope.currentPage = 1;
    $scope.pageChangeHandler = function(num) {
            $scope.currentPage = num;
        };
    $scope.pageSize = 6;



    
    $scope.addToCart = function (sp) {
        let item = {};
        item.id = sp.id;
        item.name = sp.name;
        item.image = sp.image;
        item.unit_price = sp.unit_price;
        item.so_luong = 1;
        var list;
        if (localStorage.getItem('cart') == null) {
            list = [item];
        } else {
            list = JSON.parse(localStorage.getItem('cart')) || [];
            let ok = true;
            for (let x of list) {
                if (x.id == item.id) {
                    x.so_luong += 1;
                    ok = false;
                    break;
                }
            }
            if (ok) {
                list.push(item);
            }
        }
        localStorage.setItem('cart', JSON.stringify(list));
        alert("Đã thêm giỏ hàng thành công");
    }

  
})