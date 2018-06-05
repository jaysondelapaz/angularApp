<html>
<head>
<script src="js/angular.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script> 
    <script src="js/ns.js"></script>
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
  
    <script src="https://use.fontawesome.com/14c1829b7f.js"></script>
<script>
    angular.module("sampleApp", [])
  .filter('sumOfValue', function() {
    return function(data, key) {
      debugger;
      if (angular.isUndefined(data) || angular.isUndefined(key))
        return 0;
      var sum = 0;

      angular.forEach(data, function(v, k) {
        sum = sum + parseInt(v[key]);
      });
      return sum;
    }
  }).filter('totalSumPriceQty', function() {
    return function(data, key1, key2) {
      if (angular.isUndefined(data) || angular.isUndefined(key1) || angular.isUndefined(key2))
        return 0;

      var sum = 0;
      angular.forEach(data, function(v, k) {
        sum = sum + (parseInt(v[key1]) * parseInt(v[key2]));
      });
      return sum;
    }
  }).controller("sampleController", function($scope) {
    $scope.items = [{
      "id": 1,
      "details": "test11",
      "quantity": 2,
      "price": 100
    }, {
      "id": 2,
      "details": "test12",
      "quantity": 5,
      "price": 120
    }, {
      "id": 3,
      "details": "test3",
      "quantity": 6,
      "price": 170
    }, {
      "id": 4,
      "details": "test4",
      "quantity": 8,
      "price": 70
    }, {
      "id": 5,
      "details": "test5",
      "quantity": 2,
      "price": 160
    }, {
      "id": 6,
      "details": "test6",
      "quantity": 9,
      "price": 100
    }]
});

</script>

</head>
<body>

        <h4>Price</h4>

      </div>
      <div class="col-md-2 col-lg-2 col-sm-2 col-xsml-2 text-right">
        <h4>Total</h4>

      </div>
      <div ng-repeat="item in resultValue=(items | filter:{'details':searchFilter})">
        <div class="col-md-2 col-lg-2 col-sm-2 col-xsml-2">{{item.id}}</div>
        <div class="col-md-4 col-lg-4 col-sm-4 col-xsml-4">{{item.details}}</div>
        <div class="col-md-2 col-lg-2 col-sm-2 col-xsml-2 text-right">{{item.quantity}}</div>
        <div class="col-md-2 col-lg-2 col-sm-2 col-xsml-2 text-right">{{item.price}}</div>
        <div class="col-md-2 col-lg-2 col-sm-2 col-xsml-2 text-right">{{item.quantity * item.price}}</div>
      </div>
      <div colspan='3' class="col-md-8 col-lg-8 col-sm-8 col-xsml-8 text-right">
        <h4>{{resultValue | sumOfValue:'quantity'}}</h4>

      </div>
      <div class="col-md-2 col-lg-2 col-sm-2 col-xsml-2 text-right">
        <h4>{{resultValue | sumOfValue:'price'}}</h4>

      </div>
      <div class="col-md-2 col-lg-2 col-sm-2 col-xsml-2 text-right">
        <h4>{{resultValue | totalSumPriceQty:'quantity':'price'}}</h4>

      </div>
    </div>
  </div>
</div>
</body>
</html>