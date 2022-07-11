var app = angular.module('myapp', []);
app.config(['$locationProvider', function($locationProvider){ 
    $locationProvider.html5Mode({
       enabled: true,
       requireBase: false
   });    
}]);
app.controller('mycontroller', function($scope, $http,$location) {
    var id = $location.url().split('=')[1]; 
    var GetByID='https://localhost:44375/api/NEWS/getID?id=';
    console.log(id);
    $http({
        Method: "GET",
        url: GetByID + id,
    }).success(function(response) {
        console.log(response);
        $scope.tintuc = response;
    });
})