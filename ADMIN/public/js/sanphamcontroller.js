var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('mycontroller', function($scope, $http) {

    
    var getall ='https://localhost:44375/api/SP/getall';
    var getallLSP ='https://localhost:44375/api/LSP/getall';
    var getallNCC='https://localhost:44375/api/NCC/getall';
    var add= 'https://localhost:44375/api/SP/add';
    var edit='https://localhost:44375/api/SP/update';
    var delet ='https://localhost:44375/api/SP/delete?id=';
    var GetByID='https://localhost:44375/api/SP/getID?id=';


  
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
        $scope.lsps = response;
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
            if($scope.sanpham){
                delete $scope.sanpham;
            }
        } else {
            $http({
                Method: "GET",
                url: GetByID + id
            }).success(function(response) {
                $scope.sanpham = response;
                // alert($scope.sanpham);
                for (let index = 0; index <  $scope.sanpham.length; index++) {
                    $scope.sanpham = $scope.sanpham[index];
                    CKEDITOR.instances.mota_sp.setData($scope.sanpham.mota_sp);
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
    $scope.pageSize = 5;
    
    $scope.updateData = function() {
        var m = $scope.id == 0?"POST":"PUT";
        var urll = $scope.id == 0?add:edit;
        let img = document.getElementById('file-upload');
         $scope.sanpham.mota_sp = CKEDITOR.instances.mota_sp.document.getBody().getText();
         $scope.sanpham ={
                id :  $scope.sanpham.id,
                name :$scope.sanpham.name,
                id_lsp :  $scope.sanpham.id_lsp,
                id_ncc :  $scope.sanpham.id_ncc,
                mota_sp :  $scope.sanpham.mota_sp,
                unit_price :  $scope.sanpham.unit_price,
                so_luong :  $scope.sanpham.so_luong,
                image:img.files[0].name,
                don_vi_tinh :  $scope.sanpham.don_vi_tinh,
                xem :  $scope.sanpham.xem
           }
           $http({
            method: m,
            url: urll,
            data: JSON.stringify($scope.sanpham),
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
            data: $scope.sanpham,
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

    // const fileUpload = document.querySelector("#file-upload");
    // fileUpload.addEventListener("change", (e) => {
    //     const files = e.target.files;
    //     document.getElementById('Anh').innerHTML = `<img src="/upload/gom/`+ files[0].name +`" alt="Ảnh" style="width:100%;height:100%">`;
    //     for(const file of files) {
    //         const {name, type, size, lastModified } = file;
    //         // Làm gì đó với các thông tin trên
    //         $scope.sanpham.image = file.name;
    //         document.getElementById('Anh').innerHTML = `<img src="/upload/gom/`+ file.name +`" alt="Ảnh" style="width:100%;height:100%">`;
    //     };
    // });
});