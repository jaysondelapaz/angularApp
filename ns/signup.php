<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign up</title>
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">

    <style>


    </style>
</head>

<body  ng-controller="signupController">

    <!-- Start your project here-->
   
   <!--Main Navigation-->
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

<div class="alert alert-success" id="loginbtn" role="alert" style="width:300px; margin:0px auto;display:none;"> Proceed to <a href="#!/">Login page</a> </button> </div>

 <div style="height: 10vh" >
    <div class="flex-center flex-column">
       
       <div class="col-md-4">
            
                <form class="lForm z-depth-3" style="padding:20px;">
                
                <p class="h5 text-center mb-4">Sign up </p>

                   
                    <div class="md-form form-sm" >
                          
                            <input type="text" id="firstname" ng-model="firstname" class="form-control" />
                            <label for="username">Firstname</label>

                    </div>

                    <div class="md-form form-sm" >
                          
                            <input type="text" id="lastname" ng-model="lastname" class="form-control" />
                            <label for="username">Lastname</label>
                    </div>

                    <div class="md-form form-sm" >
                         
                            <input type="text" id="middlename" ng-model="middlename" class="form-control" />
                            <label for="username">Middlename</label>
                    </div>

                    <div class="md-form form-sm" >
                         
                            <input type="text" id="contact" ng-model="contact" class="form-control" />
                            <label for="username">Contact #</label>
                    </div>

                    <div class="md-form form-sm" >
                         
                            <input type="text" id="email" ng-model="email" class="form-control" />
                            <label for="username">email</label>
                    </div>
                    <div class="md-form form-sm" >
                         
                            <input type="text" id="username" ng-model="username" class="form-control" />
                            <label for="username">username</label>
                    </div>

                    <div class="md-form form-sm" >
                        
                            <input type="password" id="upassword" ng-model="upassword" class="form-control" />
                            <label for="username">password</label>
                    </div>

                    <div class="md-form form-sm" >
                        
                            <input type="password" id="upassword" ng-model="rupassword" class="form-control" />
                            <label for="username">retype password</label>
                    </div>



                    <div class="text-center">
                        <button class="btn btn-#c62828 red darken-3" ng-click="signup();">sign in</button>
                       
                    </div>

                </form>  
           
        </div>
    </div>
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
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
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
