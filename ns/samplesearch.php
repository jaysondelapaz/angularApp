<!doctype html>
<html ng-app="plunker" >
<head>
  <meta charset="utf-8">
  <title>AngularJS Plunker</title>
  
     
  <link rel="stylesheet" href="style.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.5/angular.js"></script>
 
  <script>
      
      var app = angular.module('plunker', []);

app.controller('MainCtrl', function($scope) {
  $scope.date = '19/03/2013';
  
  $scope.items = [{name :"10/09/2013"},{name :"10/09/2013"}];
});


app.directive('datepicker', function() {
    return {
        restrict: 'A',
        require : 'ngModel',
        link : function (scope, element, attrs, ngModelCtrl) {
            $(function(){
                element.datepicker({
                    dateFormat:'dd/mm/yy',
                    onSelect:function (date) {
                        ngModelCtrl.$setViewValue(date);
                        scope.$apply();
                    }
                });
            });
        }
    }
});

app.directive('autocomplete', function() {
    return {
        restrict: 'A',
        require : 'ngModel',
        link : function (scope, element, attrs, ngModelCtrl) {
              var availableTags = [
                "ActionScript",
                "AppleScript",
                "Asp",
                "BASIC",
                "C",
                "C++",
                "Clojure",
                "COBOL",
                "ColdFusion", 
                "Erlang",
                "Fortran",
                "Groovy",
                "Haskell",
                "Java",
                "JavaScript",
                "Lisp",
                "Perl",
                "PHP",
                "Python",
                "Ruby",
                "Scala",
                "Scheme"
              ];
              element.autocomplete({
                source: availableTags,
                select:function (event,ui) {
                  console.log(ui);
                    ngModelCtrl.$setViewValue(ui.item);
                    scope.$apply();
                }
              });
                
            
        }
    }
});


  </script>
</head>
<body ng-controller="MainCtrl">
  <h1> Selected date: {{date}}</h1> 
  
  <input type="text" ng-model="date" datepicker="true" />
  
  <div ng-repeat="item in items">
    <input type="text"  datepicker="true" ng-model="item.name" />
  </div>
  
  <div>{{items || json}}</div>
  
  
  <input type="text" ng-model="auto" autocomplete="true" />
  
  <input type="text" ng-model="auto1" autocomplete="true" />
  
  <span>{{auto1.label}}</span>
  <div>{{auto1}}</div>
</body>
</html>
