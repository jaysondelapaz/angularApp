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

<body  ng-controller="productController">

<header>

</header>
<!--Main Navigation-->

<!--Main layout-->
<main >




<!-- Modal -->
<div class="modal fade" id="ProductModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
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
                                              
                                                <input type="text" id="ProductCode" ng-model="ProductCode" ng-change="ProductCode = (ProductCode | uppercase)"  class="form-control" />
                                                <label for="username">ProductCode</label>

                                        </div>

                                        <div class="md-form form-sm" >
                                              
                                                <input type="text" id="ProductName" ng-model="ProductName"  ng-blur="ProductName = (ProductName | uppercase)" class="form-control" />
                                                <label for="ProductName">ProductName</label>
                                        </div>


                                    
                                        <div class="md-form form-sm" >
                                             
                                                <input type="number" id="srp1" ng-model="srp1"  class="form-control" />
                                                <label for="srp1">Customer Price </label>
                                        </div>

                                        <div class="md-form form-sm" >
                                             
                                                <input type="number" id="srp2" ng-model="srp2"  class="form-control" />
                                                <label for="srp1">Supplier Price </label>
                                        </div>

                                        
                                       
                                         <div class="md-form form-sm" >
                                        
                                                  <select id="category" ng-model="category">
                                                    <option value="" disabled selected>Men or Women</option>
                                                  <?php
                                                        $l = new apiFunction;
                                                        $cat = $l->_select("categorytable");
                                                        while($g = $cat->fetch_object()){
                                                            echo"<option value='$g->categoryID'>$g->categoryname</option>";
                                                        }   
                                                  ?>
                                                  </select>
                                                
                                         </div>

                                        <div class="text-center">
                                            <button class="btn btn-#c62828 red darken-3" ng-click="save();">save</button>
                                           
                                        </div>

                                    </form>  
                
               
            </div><!--MODAL BODY-->
           
        </div>
    </div>
</div><!--END OF MODAL-->




<?php  require_once("productedit.php"); ?>
 

 <div class="container lForm z-depth-3" style="margin-bottom: 50px;">

<div class="col-md-12" >       
             
                <button type="button" class="btn btn-#c62828 red darken-3" data-toggle="modal" data-target="#ProductModal">
                    +
                </button>
                
                <div class="col-md-3" style="float:right;"> <input type="text" ng-model="search" placeholder="Search" />
                                               
</div>


    <!--Table-->
<table class="table table-responsive">

       

    <!--Table head-->
    <thead class="red darken-3">
        
        <tr>
            <th>Image</th>
            <th>ProductName</th>
            <th>ProductCode</th>
             <th>Gender</th>
            <th>Sp</th>       
             <th>Actions</th>
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
        <tr ng-repeat="prdct in productss | filter:search">
            <td><i class="fa fa-photo" aria-hidden="true"></i></td>
            <td>{{prdct.productCode}}</td>
            <td>{{prdct.productName}}</td>
            <td>{{prdct.categoryname}}</td>         
            <td>{{prdct.srp1}}</td>
          
            <td><i class="fa fa-edit" aria-hidden="true" data-toggle="modal" data-target="#ProductModalEdit" ng-click="EditProduct(prdct.productCode);" ></i>&nbsp; | &nbsp;<i class="fa fa-remove" ng-click="deleteProduct(prdct.productCode);" aria-hidden="true"></i></td>
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
