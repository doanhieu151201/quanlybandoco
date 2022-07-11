var app = angular.module('myapp', []);
app.config(['$locationProvider', function($locationProvider){ 
    $locationProvider.html5Mode({
       enabled: true,
       requireBase: false
   });    
}]);
app.controller('mycontroller', function($scope, $http,$location) {
    var id = $location.url().split('=')[1]; 
    var GetByID='https://localhost:44375/api/SP/getID?id=';
    console.log(id);
    $http({
        Method: "GET",
        url: GetByID + id,
    }).success(function(response) {
        console.log(response);
        $scope.sanpham = response;
    });

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