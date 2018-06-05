<html lang="en" >
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Angular Material style sheet -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
  <script src="js/angular.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
  
  <!-- Angular Material Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
   <script type="text/javascript">    
    /**
     * You must include the dependency on 'ngMaterial' 
     */
    
    var app = angular.module('app', []);
    app.controller('pController', function($scope, $http){
    	$scope.product = function(){

			 $http.get("api/search.php").then(
				function(response) {
					$scope.productss = response.data;
					//console.log($scope.productss);
				}); 
			 $scope.product();
		};
    });

  </script>
  
</head>
<body ng-app="app">
  <!--
    Your HTML content here
  -->  
  


  <div ng-controller="pController as ctrl" layout="column" ng-cloak>
  <md-content class="md-padding">
    <form ng-submit="$event.preventDefault()">
     <md-autocomplete    
          md-selected-item="ctrl.selectedItem"
          md-search-text-change="ctrl.searchTextChange(ctrl.searchText)"
          md-search-text="ctrl.searchText"
          md-selected-item-change="ctrl.selectedItemChange(item)"
          md-items="item in ctrl.productss"
          md-item-text="item.productCode"
          md-min-length="0"
          placeholder="Search here">
        <md-item-template>
          <span md-highlight-text="ctrl.searchText" md-highlight-flags="^i">{{item.productCode}}</span>
        </md-item-template>
      
      </md-autocomplete>
 </form>
  </md-content>
</div>

  <!-- Angular Material requires Angular.js Libraries -->

  <!-- Your application bootstrap  -->
 
</body>
</html>
