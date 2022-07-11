var app = angular.module('myapp', []);
app.controller('mycontroller', function($scope,$http) {
    $scope.listSP = [];

    var getall ='https://localhost:44375/api/SP/getall';
    var getallban ='https://localhost:44375/api/BAN/getall';


    var GetByIDCTBAN ='https://localhost:44375/api/CTBAN/getID?id=';

    var getallNCC='https://localhost:44375/api/NCC/getall';

       var GetByIDKH='https://localhost:44375/api/KH/getID?id=';




    

  



    /*=================== Thao tác dữ liệu ==================================== */
    $scope.LoadCart = function () {
        $scope.listSP = JSON.parse(localStorage.getItem('cart'));
    };
    $scope.LoadCart();
    
    $scope.Tang = function (item) {
        var index = $scope.listSP.indexOf(item);
        if (index >= 0) {
            $scope.listSP[index].so_luong += 1;
        }
        localStorage.setItem('cart', JSON.stringify($scope.listSP));
    }
    $scope.Giam = function (item) {
        var index = $scope.listSP.indexOf(item);
        if (index >= 0 && $scope.listSP[index].so_luong >= 2) {
            $scope.listSP[index].so_luong -= 1;
        }
        localStorage.setItem('cart', JSON.stringify($scope.listSP));
    }
    $scope.Xoa = function (item) {
        var index = $scope.listSP.indexOf(item);
        $scope.listSP.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify($scope.listSP));
        alert("Đã xóa sản phẩm thành công");
    }
    $scope.removeSP = function () {
        localStorage.removeItem('cart')
    }

    $scope.totalprice = function(){
        $scope.total = 0;
        $scope.listSP = JSON.parse(localStorage.getItem('cart'));
        if($scope.listSP==null){
           return  $scope.total = 0;
        }
        else{
            for(var i=0; i<$scope.listSP.length;i++){
                $scope.total+=$scope.listSP[i].so_luong*$scope.listSP[i].unit_price;
            }
        }
        return  $scope.total;
    }
         $scope.totalprice();



    $scope.getdate = function () {
        var d = new Date();
        d = new Date(d.getTime() - 3000000);
        var date_format_str = d.getFullYear().toString()+"-"+((d.getMonth()+1).toString().length==2?(d.getMonth()+1).toString():"0"+(d.getMonth()+1).toString())+"-"+(d.getDate().toString().length==2?d.getDate().toString():"0"+d.getDate().toString())+" "+(d.getHours().toString().length==2?d.getHours().toString():"0"+d.getHours().toString())+":"+((parseInt(d.getMinutes()/5)*5).toString().length==2?(parseInt(d.getMinutes()/5)*5).toString():"0"+(parseInt(d.getMinutes()/5)*5).toString())+":00";
        console.log(date_format_str);
        return date_format_str;
    }

    // $scope.array_product = [];

    $scope.infomation = function(){
        $scope.info = " ";
        $scope.listSP = JSON.parse(localStorage.getItem('cart'));
        if($scope.listSP==null){
           return  $scope.info = " ";
        }
        else{
            for(var i=0; i<$scope.listSP.length;i++){
                $scope.info+=$scope.listSP[i].name+":"+$scope.listSP[i].so_luong+";";
            }
        }
        return  $scope.info;
    }
    $scope.updateData = function() {
        var t  = document.getElementById('name_kh').value;
        $scope.ban ={
            id    :$scope.sinhma(),
            id_kh : $scope.getiduser(),
            name_kh : t,
            tong_tien : $scope.totalprice (),
            date_order : $scope.getdate(),
            payment : "on",
            status :  '0',
            note : $scope.infomation()
        }
        $http({
            method: "POST",
            url: getallban,
            data: $scope.ban,
            headers: { 'Content-Type': 'application/json' }
        }).success(function(response) {
            $scope.removeSP();
            alert('ĐẶT HÀNG THÀNH CÔNG');
            $scope.LoadCart();
            window.location.reload();

        });
    }


    $scope.getiduser=()=>{
        let arr =   JSON.parse(sessionStorage.getItem('users'));
        return arr.id;
    }
    let r = (Math.random() + 1).toString(36).substring(7);
    $scope.detail_bill = function(id) {
        $scope.cban ={
            id_bill_ban:$scope.sinhma(),
            id_kh : $scope.getiduser(),
            sp : $scope.sp(),
            sl :$scope.sl(),
            tong : $scope.totalprice(),
           
        }
        $http({
            method: "POST",
            url: GetByIDCTBAN + id,
            data: $scope.cban,
            headers: { 'Content-Type': 'application/json' }
        }).success(function(response) {
            window.location.reload();

        });
    }
    $scope.sp = function(){
        $scope.listSP = JSON.parse(localStorage.getItem('cart'));
        var sp = " ";
        if($scope.listSP==null){
           return  null;
        }
        else{
            for(var i=0; i<$scope.listSP.length;i++){
                sp+=$scope.listSP[i].name+":";
            }
        }
        return sp;
    }
    $scope.sl = function(){
        $scope.listSP = JSON.parse(localStorage.getItem('cart'));
        var sp = " ";
        if($scope.listSP==null){
           return  null;
        }
        else{
            for(var i=0; i<$scope.listSP.length;i++){
                sp+=$scope.listSP[i].so_luong+":";
            }
        }
        return sp;
    }


    $scope.tongia = function(){
        $scope.listSP = JSON.parse(localStorage.getItem('cart'));
        var sp = " ";
        if($scope.listSP==null){
           return  null;
        }
        else{
            for(var i=0; i<$scope.listSP.length;i++){
                sp+=$scope.listSP[i].so_luong*$scope.listSP[i].unit_price+":";
            }
        }
        return sp;
    }
    $scope.updateCustomer = function(id) {
        $scope.khach ={
            id : $scope.getiduser(),
            ten_kh :$scope.khach.ten_kh,
            email :$scope.khach.email,
            dia_chi :$scope.khach.dia_chi,
            sdt :$scope.khach.sdt,
        }
        $http({
            method: "POST",
            url: GetByIDKH + id,
            data: $scope.khach,
            headers: { 'Content-Type': 'application/json' }
        }).success(function(response) {
            window.location.reload();
        });

    }
    $scope.sinhma =()=>{
        let r = Math.floor(Math.random() * 1001);
        return r;
    }

  

});