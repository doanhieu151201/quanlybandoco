var app = angular.module('myapp',['angularUtils.directives.dirPagination']);
app.controller('mycontroller', function($scope, $http) {
    var getall ='https://localhost:44375/api/NEWS/getall';
    var add= 'https://localhost:44375/api/NEWS/add';
    var edit='https://localhost:44375/api/NEWS/update';
    var delet ='https://localhost:44375/api/NEWS/delete?id=';
    var GetByID='https://localhost:44375/api/NEWS/getID?id=';

    $http({
        Method: "GET",
        url: getall
    }).success(function(response) {
        console.log(response);
        $scope.news = response;
    });
    $scope.editClick = function(id) {
       
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Them moi ban tin";
            // $scope.sanpham._token = CSRF_TOKEN;
            if($scope.new){
                delete $scope.new;
            }
        } else {
            $http({
                Method: "GET",
                url:GetByID + id
            }).success(function(response) {
                $scope.new = response;
                for (let index = 0; index < $scope.new.length; index++) {
                    $scope.new = $scope.new[index];
                    CKEDITOR.instances.content.setData($scope.new.content);
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

        $scope.new.content = CKEDITOR.instances.content.document.getBody().getText();
         $scope.new ={
                id :  $scope.new.id,
                title :$scope.new.title,
                content :  $scope.new.content,
                image:img.files[0].name,

           }
           $http({
            method: m,
            url: urll,
            data: JSON.stringify($scope.new),
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
            data: $scope.new,
            headers: { 'Content-Type': 'application/json' }
        }).success(function(response) {
            console.log(response);
            
        }); 
        alert("Ban vua chon xoa id=" + id);
        location.reload();
    } else {
        alert("Ban da huy lenh xoa");
    }
    }
    // const fileUpload = document.querySelector("#file-upload");
    // fileUpload.addEventListener("change", (e) => {
    //     const files = e.target.files;
    //     document.getElementById('Anh').innerHTML = `<img src="/upload/tintuc/`+ files[0].name +`" alt="Ảnh" style="width:100%;height:100%">`;
    //     for(const file of files) {
    //         const {name, type, size, lastModified } = file;
    //         // Làm gì đó với các thông tin trên
    //         $scope.new.image = file.name;
    //         document.getElementById('Anh').innerHTML = `<img src="/upload/tintuc/`+ file.name +`" alt="Ảnh" style="width:100%;height:100%">`;
    //     };
    // });
});