<!DOCTYPE html>
<html>
<head>
  <title>
    
  </title>

   <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.5/angular.js"></script>

  <script>

    var fetch = angular.module('myapp', []);

fetch.controller('fetchCtrl', ['$scope', '$http', function ($scope, $http) {
 
 // Fetch data
 $scope.fetchUsers = function(){
 
  $http({
   method: 'post',
   url: 'autocom.php',
   data: {searchText:$scope.searchText}
  }).then(function successCallback(response) {
   $scope.searchResult = response.data;
  });
 }

 // Set value to search box
 $scope.setValue = function(index){
  $scope.searchText = $scope.searchResult[index].productCode;
  $scope.searchResult = {};
 }
 
}]);

  </script>
</head>
<body ng-app='myapp'>

 <div ng-controller="fetchCtrl">
 
  <input type='text' ng-keyup='fetchUsers()' ng-model='searchText'><br>
  <ul id='searchResult' >
   <li ng-click='setValue($index)' ng-repeat="result in searchResult" >{{ result.productCode }}</li>
  </ul>
 
 </div>
 
</body>
</html>