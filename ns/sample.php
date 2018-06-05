<html lang="en" >
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Angular Material style sheet -->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>

  <!-- Angular Material Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
</head>

<body ng-app="datepickerBasicUsage" >
  <!--
    Your HTML content here
  -->  
  
  <!-- Angular Material requires Angular.js Libraries -->
 
  
  <!-- Your application bootstrap  -->
  <script type="text/javascript">    
    /**
     * You must include the dependency on 'ngMaterial' 
     */
   angular.module('datepickerBasicUsage',
    ['ngMaterial', 'ngMessages']).controller('AppCtrl', function($scope) {
  $scope.myDate = new Date();
  $scope.minDate = new Date(
      $scope.myDate.getFullYear(),
      $scope.myDate.getMonth() - 2,
      $scope.myDate.getDate());
  $scope.maxDate = new Date(
      $scope.myDate.getFullYear(),
      $scope.myDate.getMonth() + 2,
      $scope.myDate.getDate());
  $scope.onlyWeekendsPredicate = function(date) {
    var day = date.getDay();
    return day === 0 || day === 6;
  };
});
  </script>
  



  <div ng-controller="AppCtrl" >
  <md-content layout-padding>
    <div layout-gt-xs="row">
      <div flex-gt-xs>
        <h4>Standard date-picker</h4>
        <md-datepicker ng-model="myDate" md-placeholder="Enter date"></md-datepicker>
      </div>
      <div flex-gt-xs>
        <h4>Disabled date-picker</h4>
        <md-datepicker ng-model="myDate" md-placeholder="Enter date" disabled></md-datepicker>
      </div>
    </div>
    <div layout-gt-xs="row">
      <div flex-gt-xs>
        <h4>Date-picker with min date and max date</h4>
        <md-datepicker ng-model="myDate" md-placeholder="Enter date"
            md-min-date="minDate" md-max-date="maxDate"></md-datepicker>
      </div>
      <div flex-gt-xs>
        <h4>Only weekends are selectable</h4>
        <md-datepicker ng-model="myDate" md-placeholder="Enter date"
            md-date-filter="onlyWeekendsPredicate"></md-datepicker>
      </div>
    </div>
    <div layout-gt-xs="row">
      <div flex-gt-xs>
        <h4>Only weekends within given range are selectable</h4>
        <md-datepicker ng-model="myDate" md-placeholder="Enter date"
            md-min-date="minDate" md-max-date="maxDate"
            md-date-filter="onlyWeekendsPredicate"></md-datepicker>
      </div>
      <div flex-gt-xs>
        <h4>Opening the calendar when the input is focused</h4>
        <md-datepicker ng-model="myDate" md-placeholder="Enter date"
          md-open-on-focus></md-datepicker>
      </div>
    </div>
    <div layout-gt-xs="row">
      <form name="myForm" flex-gt-xs>
        <h4>With ngMessages</h4>
        <md-datepicker name="dateField" ng-model="myDate" md-placeholder="Enter date"
            required md-min-date="minDate" md-max-date="maxDate"
            md-date-filter="onlyWeekendsPredicate"></md-datepicker>
        <div class="validation-messages" ng-messages="myForm.dateField.$error">
          <div ng-message="valid">The entered value is not a date!</div>
          <div ng-message="required">This date is required!</div>
          <div ng-message="mindate">Date is too early!</div>
          <div ng-message="maxdate">Date is too late!</div>
          <div ng-message="filtered">Only weekends are allowed!</div>
        </div>
      </form>
      <form name="myOtherForm" flex-gt-xs>
        <h4>Inside a md-input-container</h4>
        <md-input-container>
          <label>Enter date</label>
          <md-datepicker ng-model="myDate" name="dateField" md-min-date="minDate"
            md-max-date="maxDate"></md-datepicker>
          <div ng-messages="myOtherForm.dateField.$error">
            <div ng-message="valid">The entered value is not a date!</div>
            <div ng-message="required">This date is required!</div>
            <div ng-message="mindate">Date is too early!</div>
            <div ng-message="maxdate">Date is too late!</div>
          </div>
        </md-input-container>
      </form>
    </div>
  </md-content>
</div>
</body>
</html>

<!--
Copyright 2016 Google Inc. All Rights Reserved. 
Use of this source code is governed by an MIT-style license that can be in foundin the LICENSE file at https://material.angularjs.org/license.


SELECT hdr.cid as cid, hdr.oid as oid, CONCAT(customertable.cname,' ', customertable.clastname) as name, dtl.productCode as productCode, producttable.productName as poductName

FROM ordertablehdr as hdr
LEFT JOIN customertable ON hdr.cid = customertable.cid
LEFT JOIN ordertabledtl as dtl ON hdr.oid  = dtl.oid
LEFT JOIN producttable ON dtl.productCode = producttable.productCode
WHERE hdr.oid = 1;