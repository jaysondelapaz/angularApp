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
    <title>Order</title>
    
       <!-- JQuery -->
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.css" rel="stylesheet">

    <script src="jqueryui/jquery-ui.min.js"></script>
    <link href="jqueryui/jquery-ui.min.css" rel="stylesheet">





<style>
.form-sm{
	margin-left:30px;	
}
th{
	color:#fff;
}

.modal{
    width:1300px;
}
</style>
</head>

<body  ng-controller="orderController">

<header>

</header>
<!--Main Navigation-->

<!--Main layout-->
<main >




<?php /*
 <div style="height: 10vh" >
    <div class="flex-center flex-column" style="margin-top:60px;">
       
       <div >
         	
                <form class="lForm z-depth-3 form-inline" style="padding:20px;">
             
                <div class="col-md-12" style="">

                <div ng-repeat="a in content"> {{a.cname}} <input type="" ng-model ="txtname" value="{{a.cname}}"></div>

                	<select class="mdb-select" ng-model="selectcus" ng-change="getdata(selectcus);">
                	<option value="" disabled selected>Select Customer</option>
                                                  <?php
                                                        $l = new apiFunction;
                                                        $cat = $l->_select("customertable");
                                                        while($g = $cat->fetch_object()){
                                                            echo"<option value='$g->cid'> ".$g->cname." ".$g->cmiddlename."."." ".$g->clastname."</option>";
                                                        }   
                                                    ?>
                	</select>
                </div>
                   
                    <div class="md-form form-sm" >
                          <select ng-model="selectedProduct">
                          <option value="" disabled selected>Select Product</option>
                                <?php
                                                        $l = new apiFunction;
                                                        $cat = $l->_select("producttable");
                                                        while($g = $cat->fetch_object()){
                                                            echo"<option value='$g->productCode'> ".$g->productName."</option>";
                                                        }   
                                                    ?>
                          </select>
                          <input type="text" id="ProductCode"  ng-model="ProductCode"   class="form-control" />

                           <!-- <input type="text" id="ProductCode" ng-keyup="fetchProduct();"" ng-model="ProductCode"   class="form-control" />

                            <label for="ProductCode">ProductCode</label>
                                <ul class="fa-ul">
                                <li ng-click="setValue($index)" ng-repeat="result in searchResult"  >{{ result.productCode }}</li>
                             </ul>  -->

                            

                    </div>

                    <div class="md-form form-sm" >
                          
                            <input type="text" id="ProductName"  ng-model="ProductName"  ng-blur="ProductName = (ProductName | uppercase)" class="form-control" />
                            <label for="username">ProductName</label>
                    </div>

                     <div class="md-form form-sm" >
                    
							  <select id="ml" ng-model="ml">
							    <option value="" disabled selected>100ml / 50ml</option>
							    <option value="180">100ml</option>
							    <option value="130">50ml</option>
							  </select>
							
					 </div>

					 <div class="md-form form-sm" >
                         
                            <input type="number" id="quantity" ng-model="quantity"  class="form-control" />
                            <label for="username">quantity</label>
                    </div>
                
                    <div class="md-form form-sm"  >
                         
                            <input type="number" id="price" ng-model="price"  class="form-control" />
                            <label for="username">price</label>
                    </div>

                    <div class="text-center" >
                        <!--<button class="btn btn-#c62828 red darken-3" ng-click="">Add</button>  -->
                         <button class="btn" id="sad" ng-click="">Add</button>  
                    </div>

                </form>  
           
        </div>
    </div>
 </div>   */

?>

<!-- Modal -->
<div class="modal fade" id="Modal_Order" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                 <div class="alert alert-success" id="alertbox" role="alert" style="width:300px; margin:0px auto;display:none;">
                  <strong>{{m}}</strong>
                </div>

                 <div class="alert alert-danger" id="errormsg" role="alert" style="width:300px; margin:0px auto;display:none;">
                  <strong>{{m}}</strong>
                </div>

            </div>
            <div class="modal-body col-md-12">

               

                                    <form class="form-inline" id="FormInput" >
                                        <div class="md-form" style="margin-right: 15px;">
                                        <textarea class="form-control" ng-model="description" ></textarea>
                                        <label for="description">Description</label>
                                        </div>
                                       
                                        <div class="md-form"  ng-init="getCustomer();" >
                                              
                                               <select  ng-model="selectCustomer">
                                               <option value="" disabled selected> Select Customer</option>
                                                <option ng-repeat="list in customerlist" value="{{list.cid}}">{{list.cname}} {{list.clastname}}</option>
                                                
                                                  </select>

                                        </div>

                                        <div class="md-form form-sm" >
                                              
                                                <select ng-model="selectedProduct" ng-change="LoadPrice();">
                                                 <option value="" disabled selected>Select Product</option>
                                                    <?php
                                                        $l = new apiFunction;
                                                        $cat = $l->_select("producttable");
                                                        while($g = $cat->fetch_object()){
                                                            echo"<option value='$g->productCode'> ".$g->productName."</option>";
                                                        }   
                                                    ?>
                                              </select>

                                              <?php /*<select ng-model="nPrice">
                                                    <option value="">select price</option>
                                                    <option ng-repeat="n in CustomerPrice" value="{{n.Price}}">{{n.Price}}</option>
                                              </select> */ ?>
                                             
                                        </div>

                                      

                                         <div class="md-form form-sm" >
                                              
                                                <select ng-model="selectML">
                                                 <option value="" disabled selected>100ML / 50ML</option>
                                                 <option value="100">100ML</option>
                                                 <option value="50">50ML</option>
                                                   
                                              </select>
                                        </div>


                                    
                                        <div class="md-form form-sm" ng-repeat="m in CustomerPrice" >
                                         <input type=""  id="price" ng-model="price" ng-value="{{m.Price}}" ng-change="total();"  class="form-control" style="width:80px;border:none;" />
                                           <label for="price"></label>
                                             
                                        </div>

                                         <div class="md-form form-sm" >
                                             
                                                <input type="number" id="qty" value="" ng-model="qty" ng-change="total();" class="form-control" style="width:80px"/>
                                                <label for="qty">Qty</label>

                                           
                                        </div>
                                       


                                        <div class="md-form form-sm" style="padding:20px;font-weight: bold;font-size: 1.2em;">
                                            Total: <input  class="form-control" ng-model="Total" value="{{Total | number}}" style="border:none;margin-left:5px;font-weight:bold;font-size:1em; margin-top:15px;width:70px;"/>

                                        </div>     

                                            
                                       

                                        

                                        <div class="md-form form-sm">

                                            <!--<button class="btn " ng-click="Addrow();">save</button> -->
                                            <button class="btn btn-#c62828 red darken-3"  ng-click="Addrow();" 
                                                 ng-keydown="($event.keyCode === 13 || $event.keyCode === 32) && Addrow();" style="display:none;">Add</button>
                                           
                                        </div>

                                    </form> 

                 <!--Table container-->                   
                <div class="col-md-12" style="">
                    <table class="table table-responsive" >

                    <!--Table head-->
                    <thead class="red darken-3">
                        <tr>                           
                            <th>ProductCode</th>
                            <th>ML</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Action</th>
                            <th><button ng-click="save();">save</button></th>
                          
                        </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                    <tbody>
                        <tr ng-repeat="data in order">
                          
                            <td>{{data.ProductCode}}</td>
                            <td>{{data.ML}}</td>
                            <td>{{data.Price}}</td>
                            <td>{{data.Qty}}</td>
                            <td>{{data.total}}</td>
                             <td> &nbsp;<i class="fa fa-remove" ng-click="Removerow(data);" aria-hidden="true"></i></td>
                          
                        </tr>
                    </tbody>
                    <tfooter>
                    <tr>
                    <td></td>
                   <td></td>
                   <td></td>
                    <td style="font-weight: bold;">Total:</td>
                     <td>{{order|sumByKey:'total' | number:2}}</td>
                    </tr>
                    </tfooter>   
                   </table>  
                    
                </div> <!--End of table container-->
               
            </div><!--MODAL BODY-->
           
        </div>
    </div>
</div><!--END OF MODAL-->


<!--EDIT MODAL-->
<?php require_once('orderedit.php'); ?>

<div class="container lForm z-depth-3" style="margin-bottom: 50px;">

<div class="col-md-12" >       
             
                <button type="button" class="btn btn-#c62828 red darken-3" data-toggle="modal" data-target="#Modal_Order">
                    +
                </button>
                
                <div class="col-md-3" style="float:right;"> <input type="text" ng-model="search" placeholder="Search" />
                                               
</div>

 	<!--Table-->
<table class="table table-responsive" >

    <!--Table head-->
    <thead class="red darken-3">
        <tr>
            <th>OrderID</th>
            <th>Description</th>
            <th>Customer</th>
            <th>Qty</th>
            <th>TotalPrice</th>
            <th>TotalSp</th>
            <th>Profit</th>
            <th>Action</th>
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
        <tr ng-repeat =" orders in orderlist | filter:search">
            <td>{{orders.orderid}}</th>
            <td>{{orders.description}}</td>
            <td>{{orders.name}}</td>
            <td>{{orders.qty}}</td>
            <td>{{orders.total | number:2}}</td>
            <td>{{orders.totalsp | number:2}}</td>
            <td>{{orders.profit | number:2}}</td>
            <td><i class="fa fa-edit" aria-hidden="true" ng-click="Edit2(orders.orderid);" data-toggle="modal" data-target="#Modal_Edit"></i></td>

        </tr>
     
        <tfooter>
        <td></td>
        <td></td>
        <td style="font-weight: bold;">Total</td>
        <td style="color:green;font-weight: bold;">{{orderlist|sumByKey:'qty' }}</td>
        <td style="color:green;font-weight: bold;">{{orderlist|sumByKey:'total' | number:2}}</td>
        <td style="color:green;font-weight: bold;">{{orderlist|sumByKey:'totalsp' | number:2}}</td>
        <td style="color:green;font-weight: bold;">{{orderlist|sumByKey:'profit' | number:2}}</td>
        
        </tfooter>
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