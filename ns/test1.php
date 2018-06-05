 <?php
 require_once("/api/model.php");	
 require_once("/page/home.php");							  		
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Order</title>
    
       <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">

    <script src="js/jqueryui/jquery-ui.min.js"></script>
    <link href="js/jqueryui/jquery-ui.min.css" rel="stylesheet">



<script>
    $(document).ready(function() {
 
  $("#ProductCode").autocomplete({
          source: function(request, response) {
                    $.ajax({
                        cache: false,
                        async: false,
                        url: "api/search.php",
                        type: "POST",
                        dataType: "json",
                        data: {term: request.term,searchBy:'ProductCode'},
                        success: function(responseText) {
                            response(responseText);
                            console.log(responseText);
                            }
                    });//end of ajax
           }
      });//end of autocomplete
 



});
</script>

<style>
.form-sm{
	margin-left:30px;	
}
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



<div class="alert alert-success" id="alertbox" role="alert" style="width:300px; margin:0px auto;display:none;">
  <strong>{{m}}</strong>
</div>

<div class="alert alert-danger" id="errormsg" role="alert" style="width:300px; margin:0px auto;display:none;">
  <strong>{{m}}</strong>
</div>



 <div style="height: 10vh" >
    <div class="flex-center flex-column" style="margin-top:60px;">
       
       <div >
         	
                <form class="lForm z-depth-3 form-inline" style="padding:20px;">
             
                <div class="col-md-12" style="">

                <input id="myText" ng-model="myText" />

                	<select class="mdb-select">
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
                          
                            <input type="text" id="ProductCode"  ng-model="ProductCode"   class="form-control" />
                            <label for="username">ProductCode</label>

                            

                    </div>

                    <div class="md-form form-sm" >
                          
                            <input type="text" id="ProductName" ng-model="ProductName"  ng-blur="ProductName = (ProductName | uppercase)" class="form-control" />
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
                         <button class="btn" ng-click="">Add</button>  
                    </div>

                </form>  
           
        </div>
    </div>
 </div>   


<div class="container lForm z-depth-3" style="margin-bottom: 50px;margin-top: 70px;">
 	<!--Table-->
<table class="table table-responsive" >

    <!--Table head-->
    <thead class="red darken-3">
        <tr>
            <th>ProductCode</th>
            <th>ProductName</th>
            <th>ML</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>0.00</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>0.00</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>0.00</td>
        </tr>
         <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>0.00</td>
        </tr>
         <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>0.00</td>
        </tr>
         <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>0.00</td>
        </tr>
        <tfooter>
        <td></td>
        <td></td>
        <td></td>
        <td style="font-weight: bold;">Total Qty</td>
        <td style="font-weight: bold;">Total Price</td>
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
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script src="https://use.fontawesome.com/14c1829b7f.js"></script>
<!-- ********************************************************************************************************************************** -->    
</body>

</html>
