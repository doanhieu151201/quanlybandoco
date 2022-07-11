var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);

app.controller('mycontroller', function($scope, $http,$location) {
    var getallNew ='https://localhost:44375/api/NEWS/getall';

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
    $scope.pageSize = 3;
})