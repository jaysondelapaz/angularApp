<?php
	 require_once("../api/model.php");
	require_once("../page/home.php");	
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Product</title>
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.css" rel="stylesheet">

<style>
th{
    color:#fff;
}
</style>
</head>

<body  ng-controller="customerController">

<header>

</header>
<!--Main Navigation-->

<!--Main layout-->
<main >

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <div class="modal-body">

                <div class="alert alert-success" id="alertbox" role="alert" style="width:300px; margin:0px auto;display:none;">
                  <strong>{{m}}</strong>
                </div>

                <div class="alert alert-danger" id="errormsg" role="alert" style="width:300px; margin:0px auto;display:none;">
                  <strong>{{m}}</strong>
                </div>

                                    <form class="lForm z-depth-3" >
                                  
                                       
                                        <div class="md-form form-sm" >
                                              
                                                <input type="text" id="firstName" ng-model="firstName" ng-change="firstName = (firstName | uppercase)"  class="form-control" />
                                                <label for="FirstName">FirstName</label>

                                        </div>

                                        <div class="md-form form-sm" >
                                              
                                                <input type="text" id="lastName" ng-model="lastName"  ng-blur="lastName = (lastName | uppercase)" class="form-control" />
                                                <label for="username">LastName</label>
                                        </div>


                                    
                                        <div class="md-form form-sm" >
                                              
                                                <input type="text" id="middleName" ng-model="middleName"  ng-blur="middleName = (middleName | uppercase)" class="form-control" />
                                                <label for="username">MiddleName</label>
                                        </div>

                                       
                                         <div class="md-form form-sm" >
                                        
                                                  <select id="Gender" ng-model="Gender">
                                                    <option value="" disabled selected>Men or Women</option>
                                                     <option value="M">Male </option>
                                                      <option value="F">Female</option>
                                                 
                                                  </select>
                                                
                                         </div>

                                         <div class="md-form form-sm" >
                                              
                                                <input type="text" id="Address" ng-model="Address"  ng-blur="Address = (Address | uppercase)" class="form-control" />
                                                <label for="Address">Address</label>
                                        </div>

                                        <div class="md-form form-sm" >
                                              
                                                <input type="number" id="Contact" ng-model="Contact"  class="form-control" />
                                                <label for="Contact">Contact</label>
                                        </div>

                                        <div class="md-form form-sm" >
                                              
                                                <input type="number" id="rrp1" ng-model="rrp1"  class="form-control" />
                                                <label for="rrp1">Price 100ml</label>
                                        </div>

                                        <div class="md-form form-sm" >
                                              
                                                <input type="number" id="rrp2" ng-model="rrp2"  class="form-control" />
                                                <label for="rrp2">Price 50ml</label>
                                        </div>



                                        <div class="text-center">
                                            <button class="btn btn-#c62828 red darken-3" ng-click="saveCustomer();">save</button>
                                           
                                        </div>

                                    </form>  
                
               
            </div><!--MODAL BODY-->
           
        </div>
    </div>
</div><!--END OF MODAL-->

 

 <div class="container lForm z-depth-3" style="margin-bottom: 50px;">

<div class="col-md-12" >       
             
                <button type="button" class="btn btn-#c62828 red darken-3" data-toggle="modal" data-target="#exampleModal">
                    +
                </button>
                
                <div class="col-md-3" style="float:right;"> <input type="number" placeholder="Search" />
                                               
</div>


    <!--Table-->
<table class="table table-responsive">

       

    <!--Table head-->
    <thead class="red darken-3">
        
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Address</th>
             <th>Contact</th>
            <th>Gender</th>
            <th>Contact#</th>
            <th>Address</th>
            <th>Rrp1</th>
            <th>Rrp2</th>
             <th>Actions</th>
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
        <tr ng-repeat="customer in contents">
            <td><i class="fa fa-photo" aria-hidden="true"></i></td>
            <td>{{customer.cname}}</td>
            <td>{{customer.clastname}}</td>
            <td>{{customer.cmiddlename}}</td>
            <td>{{customer.gender}}</td>
            <td>{{customer.contactno}}</td>
              <td>{{customer.address}}</td>
              <td>{{customer.rrp1}}</td>
              <td>{{customer.rrp2}}</td>
            <td><i class="fa fa-edit" aria-hidden="true"></i>&nbsp; | &nbsp;<i class="fa fa-remove" aria-hidden="true"></i></td>
        </tr>
       
       
       
    </tbody>
    <!--Table body-->
</table>
<!--Table-->

</div>  
</main>
<!--Main layout-->

<!--Footer-->
<footer>

</footer>
<!--Footer-->    
    <!-- /Start your project here-->



<!-- ********************************************************************************************************************************** -->
  	
    <!-- JQuery -->
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <script src="https://use.fontawesome.com/14c1829b7f.js"></script>
<!-- ********************************************************************************************************************************** -->    
</body>

</html>

<?php require_once('footer.php'); ?>
