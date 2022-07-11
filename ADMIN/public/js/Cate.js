var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('mycontroller', function($scope, $http) {
    var getall ='https://localhost:44375/api/LSP/getall';
    var add= 'https://localhost:44375/api/LSP/add';
    var edit='https://localhost:44375/api/LSP/update';
    var delet ='https://localhost:44375/api/LSP/delete?id=';
    var GetByID='https://localhost:44375/api/LSP/getID?id=';

 
    $http({
        Method: "GET",
        url: getall
    }).success(function(response) {
        console.log(response);
        $scope.lsps = response;
    });
    $scope.editClick = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Them moi ban tin";
            // $scope.sanpham._token = CSRF_TOKEN;
            if($scope.response){
                delete lsp.response;
            }
        } else {

            $http({
                Method: "GET",
                url: GetByID+id
            }).success(function(response) {
                $scope.LSP = response;
                for (let index = 0; index <  $scope.LSP.length; index++) {
                    $scope.LSP = $scope.LSP[index];
               
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
        var m = $scope.id == 0?"POST":"PUT";
        var urll = $scope.id == 0?add:edit;
        let img = document.getElementById('file-upload');
        $scope.LSP ={
        id     :$scope.LSP.id,
        tenloai:$scope.LSP.tenloai,
        image:img.files[0].name
       }
        $http({
            method: m,
            url: urll,
            data: JSON.stringify($scope.LSP),
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
            data: $scope.lsp,
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
    //     document.getElementById('Anh').innerHTML = `<img src="/upload/danhmuc/`+ files[0].name +`" alt="Ảnh" style="width:100%;height:100%">`;
    //     for(const file of files) {
    //         const {name, type, size, lastModified } = file;
    //         // Làm gì đó với các thông tin trên
    //         $scope.LSP.image = file.name;
    //         document.getElementById('Anh').innerHTML = `<img src="/upload/danhmuc/`+ file.name +`" alt="Ảnh" style="width:100%;height:100%">`;
    //     };
    // });
});