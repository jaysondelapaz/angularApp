
var app = angular.module('appModule', ['ngRoute']);
app.config(['$routeProvider', function($routeProvider){

	$routeProvider
	.when('/', {
		templateUrl: 'login.php',
		controller: 'loginController'
	})
	.when('/signup', {
		templateUrl: 'signup.php',
		controller: 'signupController'
	})
	.when('/home', {
		templateUrl: 'page/home.php',
		//controller: 'signupController'
	})
	.when('/product', {
		templateUrl: 'page/product.php',
		controller: 'productController'
	})
	.when('/order', {
		templateUrl: 'page/order.php',
		controller:'orderController'
	})
	.when('/customer', {
		templateUrl:'page/customer.php',
		controller: 'customerController'
	})
	.when('/supplier', {
		templateUrl:'page/supplier.php',
		controller: 'supplierController'
	})
	.when('/auto', {
		templateUrl:'autocomplete.php',
		controller: 'customerController'
	})
	.otherwise({
		redirecTo: '/'
	});


}]);


//erorr message
app.run(function($rootScope){
	$rootScope.Errormessage = function(message){
			$rootScope.m = message;
			$("#errormsg").fadeIn(3000);
			$("#errormsg").fadeOut();
	}
});

//success message / status message
app.run(function($rootScope){
	$rootScope.message = function(message){
			$rootScope.m = message;
			$("#alertbox").fadeIn(3000);
			$("#alertbox").fadeOut();
	}

});

app.run(function($rootScope){
	$rootScope.closeModal = function(modal){
		$(modal).modal('hide');
	}
});

app.run(function($rootScope){
	$rootScope.resetModal = function(modal){
		$(modal).on('hidden.bs.modal', function(){
  		  $(this).find('form')[0].reset();
  		  $("#editprice").val("");
		});
	}	
});	


//compute total sum
app.filter('sumByKey', function() {
        return function(data, key) {
            if (typeof(data) === 'undefined' || typeof(key) === 'undefined') {
                return 0;
            }

            var sum = 0;
            for (var i = data.length - 1; i >= 0; i--) {
                sum += parseInt(data[i][key]);
            }

            return sum;
        };
});

//Controller section
app.controller('signupController', function($rootScope,$scope, $http ,$location){
			$scope.clearInput = function(){
				$scope.firstname = null;
				$scope.lastname = null;
				$scope.middlename = null;
				$scope.contact = null;
				$scope.email = null;
				$scope.username = null;
				$scope.upassword = null;
			};


			$scope.signup = function(){
				$scope.action = 'signup';

			//check valid email	
			$scope.filterEmail = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
						        if(!$scope.filterEmail.test($scope.email))
						        {					        	
						        	$scope.errorMessage("Please type a  valid email!");
						          	return false; 
						       	} 


				if($scope.upassword != $scope.rupassword){
					$scope.errorMessage("Password did not match!");
					return false;
				}
				
				//alert($scope.firstname+$scope.lastname+$scope.middlename+$scope.contact+$scope.email+$scope.username+$scope.upassword);
						$http({
								method: 'POST',
								url: 'api/signup.ajax.php',
								data:{action:$scope.action,
										firstname:$scope.firstname,
										lastname:$scope.lastname,
										middlename:$scope.middlename,
										contact:$scope.contact,
										email:$scope.email,
										username:$scope.username,
										upassword:$scope.upassword
								}
						}).then(function(res){
							
									if(res.data == 'success'){
										//$location.path('/home');
										$rootScope.message("Registered Successfully!");//$scope.successMessage("Registered Successfully!");
										$scope.clearInput();
										$("#loginbtn").show();
									}else{
										$rootScope.Errormessage(res.data);//$scope.errorMessage(res.data);
									}
						});
			};
});


app.controller('loginController', function($scope, $http, $location,$rootScope){

		$scope.login  = function(){
			var action='login';
			$http({
					url:'api/login.ajax.php',
					method:'POST',
					data:{action:action,username:$scope.username,password:$scope.password}
			}).then(function(res){
				if(res.data !='invalid'){
					$location.path('/home');
				}else{
					$rootScope.Errormessage("Invalid username and password"); 
				}
			});
		};
});


//product controller
app.controller('productController', function($scope,$rootScope,$http){

	$('#ProductModal').on('hidden.bs.modal', function(){
  		  $(this).find('form')[0].reset();
		});

		$scope.save = function(){
			var action= 'Addproduct';
			//alert($scope.ProductCode+$scope.ProductName+$scope.price+$scope.category);
			$http({
				url: 'api/product.ajax.php',
				method: 'POST',
				data:{action:action,ProductCode:$scope.ProductCode,ProductName:$scope.ProductName,srp1:$scope.srp1,srp2:$scope.srp2,category:$scope.category}
			}).then(function(res){
					$rootScope.message(res.data);
					$scope.product();
					//$rootScope.closeModal('#ProductModal');
					$rootScope.resetModal("#ProductModal");
					$scope.ProductCode=null;
					$scope.ProductName=null;
					$scope.srp1=null;
					$scope.srp2=null;
					$scope.category=null;
				
			});
		};

		$scope.EditProduct = function(id){		
			$http.get('api/geteditproduct.php?id=' +id).then(function(responded) {
		        $scope.editproductss =responded.data.Precords;
		        console.log(responded.data.Precords);
		    });
		};


		$scope.deleteProduct = function (id){
		if(confirm("Are you sure you want to delete this product?")){
		
		var action = "Delete";
		//alert(id+action);
			$http({
				url:"api/product.ajax.php",
				method:"POST",
				data:{'uid':id, 'action':action}
			}).then(function(response){
				$scope.product();
			});
		}else{
			return false;
		}	
	};

		$scope.product = function(){

			 $http.get("api/lproduct.php").then(
				function(response) {
					$scope.productss = response.data;
					//console.log($scope.productss);
				}); 
		};
		$scope.product();
});


app.controller('orderController', function($scope, $http,$rootScope){
		$scope.order = [];
		$scope.Addrow = function(){
		$scope.order.push({'ProductCode':$scope.selectedProduct,'ML':$scope.selectML,'Price':$scope.price,'Qty':$scope.qty,'total':$scope.Total});	
			$scope.selectcus=""
			$scope.selectedProduct="";
			$scope.price="";
			$scope.selectML="";
			$scope.qty="";
			$scope.Total="";
		};
			
		$scope.Removerow = function(id){
			var index = $scope.order.indexOf(id);
			$scope.order.splice(index,1);
		};

		$scope.cleartable = function(){
			$scope.order = [];
		};

		

		/*$scope.getdata = function (value){
			//alert(value);
			let action = 'sProduct';
			$http({
				url:'api/test.php',
				method:'POST',
				data:{keyWord:value, action:action}
			}).then(function (res){
				$scope.content = res.data;
				$scope.ProductName = $scope.selectcus;
				console.log(res.data);
			});

		};*/

		$scope.LoadPrice = function(){
				$scope.action='LaodCustomerPrice';
			$http({
				url:'api/order.ajax.php',
				method:'POST',
				data:{action:$scope.action,id:$scope.selectedProduct}
			}).then(function(res){
				console.log(res.data.loadprice);
				$scope.CustomerPrice = res.data.loadprice;
			})
		}

		$('#Modal_Order').on('hidden.bs.modal', function(){
  		  $(this).find('form')[0].reset();
		});

		//total price order
		$scope.total = function (){
		 $scope.Total =0;
		 $scope.price = $("#price").val();
			$scope.Total =($scope.price *1) * ($scope.qty *1);
			//console.log($scope.Total);
		}

		$scope.save = function(){
			$scope.records =JSON.parse(angular.toJson($scope.order));
			$scope.action = 'insertRecord';
			$http({
				url:'api/order.ajax.php',
				method:'POST',
				//data:{action:$scope.action,description:$scope.description,customer:$scope.selectcus,records:$scope.records}
				data:{action:$scope.action,Customer:$scope.selectCustomer,description:$scope.description,order:$scope.records}
			}).then(function(response){
				console.log(response.data);
				$rootScope.message(response.data);
				$scope.cleartable();
				$scope.getOrder();
				$rootScope.resetModal("#Modal_Order");
				//$rootScope.closeModal("#Modal_Order");
			});
		};

		
		//get order
		$scope.getOrder = function(){
			$http.get("api/getorder.php")
			.then(function(res){
				$scope.orderlist = res.data;
				
			});
		};
		$scope.getOrder();

		//get 50ml price	
		$scope.getCustomer = function(){
			$http.get("api/lcustomer.php")
			.then(function(res){
				$scope.customerlist = res.data;
				console.log($scope.customerlist);
			});
		};

		//edit order data for header
		$scope.Edit = function(id){		
			$http.get('api/getedit.php?id=' +id).then(function(er) {
		        $scope.des =er.data.records;
		        console.log(er.data.records);
		    });
		};


		$rootScope.resetModal("#Modal_Edit");
		//edit for detail
		$scope.edit_details = [];
		$scope.AddrowEdit = function(){
		$scope.edit_details.push({'productCode':$scope.editselectedProduct,'ML':$scope.editselectML,'price':$scope.editprice,'qty':$scope.editqty,'totals':$scope.editTotal,'orderid':$scope.ID});	
			
			$scope.editselectedProduct="";
			$scope.editprice="";
			$scope.editselectML="";
			$scope.editqty="";
			$scope.editTotal="";
		};

		$scope.editRemoverow = function(id){
			var index = $scope.edit_details.indexOf(id);
			$scope.edit_details.splice(index,1);
		};

		$scope.edittotal = function (){
		 $scope.editTotal =0;
		 $scope.editprice=$("#editprice").val();
			$scope.editTotal =($scope.editprice *1) * ($scope.editqty *1);
			//console.log($scope.Total);
		};

		$scope.LoadPriceEdit = function(){
				$scope.action='LaodCustomerPrice';
			$http({
				url:'api/order.ajax.php',
				method:'POST',
				data:{action:$scope.action,id:$scope.editselectedProduct}
			}).then(function(res){
				console.log(res.data.loadprice);
				$scope.CustomerPrice = res.data.loadprice;
			})
		}

		

		$scope.Edit2 = function(id){
			$scope.ID =id;	
			$http.get('api/getedit2.php?id=' +id).then(function(er) {
				$scope.edit_details = er.data.details;
		        //console.log("myID"+er.data.details);
		    });
		}; 
		$scope.Edit2();

		$scope.update = function(){ 
			//alert($scope.ID);
			$scope.action='Update';
			$scope.updatedRecords = JSON.parse(angular.toJson($scope.edit_details));
			console.log($scope.updatedRecords);
			$http({
				url:'api/orderedit.ajax.php',
				method:'POST',
				data:{action:$scope.action,key:$scope.ID,Urecords:$scope.updatedRecords}
			}).then(function(response){
				console.log(response.data);
				$rootScope.message(response.data);
				$scope.getOrder();
			$rootScope.closeModal('#Modal_Edit');
			});
		};




}); 

/*app.controller('orderController', ['$scope', '$http', function ($scope, $http) {
            
            // Fetch data
            $scope.fetchProduct = function(){
                //alert($scope.ProductCode);
                $http({
                method: 'post',
                url: 'api/autocomplete.ajax.php',
                data: {searchText:$scope.ProductCode}
                }).then(function successCallback(response) {
                    $scope.searchResult = response.data;
                     //$scope.getName( $scope.searchResult)
                     console.log("nasan"+response.data);
                });
            }

             
            // Set value to search box
            $scope.setValue = function(index){
                $scope.searchText = $scope.searchResult[index].productCode;
               // $scope.searchText = $scope.searchResult[index].productName;
                $scope.searchResult = {};
            }
            
        }]); */

//costumer
app.controller('customerController', function($scope,$rootScope,$http){
		$scope.saveCustomer = function (){
			var action = "Addcustomer";
			//alert($scope.firstName+$scope.lastName+$scope.middleName+$scope.Gender+$scope.Address+$scope.Contact+$scope.rrp1+$scope.rrp2);
			$http({
				url:'api/customer.ajax.php',
				method:'POST',
				data:{
					action:action,
					firstName:$scope.firstName,
					lastName:$scope.lastName,
					middleName:$scope.middleName,
					Gender:$scope.Gender,
					Address:$scope.Address,
					Contact:$scope.Contact,
					rrp1:$scope.rrp1,
					rrp2:$scope.rrp2
				}

			}).then(function(res){
				if(res.data =='success'){
					$rootScope.message("Success Added!");
					$scope.firstName= null;
					$scope.lastName= null;
					$scope.middleName= null;
					$scope.Gender= null;
					$scope.Address= null;
					$scope.Contact= null;
				    $scope.rrp1= null;
					$scope.rrp2= null;
				}else{
					$rootScope.Errormessage(res.data); 
				}
			});
		};

		$scope.customer = function(){

			 $http.get("api/lcustomer.php").then(
				function(response) {
					//alert(response.data);
					$scope.contents = response.data;
				}); 
		};
		$scope.customer();
});

app.controller('supplierController', function($scope,$rootScope,$http){
		$scope.saveExpenses = function (){
			var action = "save";
			//alert($scope.firstName+$scope.lastName+$scope.middleName+$scope.Gender+$scope.Address+$scope.Contact+$scope.rrp1+$scope.rrp2);
			$http({
				url:'api/supplier.ajax.php',
				method:'POST',
				data:{
					action:action,
					description:$scope.description,
					amount:$scope.amount
				}

			}).then(function(res){
				$scope.expenses();
				$rootScope.message(res.data);
				$scope.description=null;
				$scope.amount=null;
			});
		};

		$scope.expenses = function(){

			 $http.get("api/lsupplier.php").then(
				function(response) {
					console.log(response.data);
					$scope.contents = response.data;
				}); 
		};
		$scope.expenses();


});