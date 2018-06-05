<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>NS</title>
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">

    <style>

    a{
        text-decoration:none;
        color:#fff;
    }
    </style>
</head>

<body  ng-controller="loginController">

    <!-- Start your project here-->
   
   <!--Main Navigation-->
<header>

</header>
<!--Main Navigation-->

<!--Main layout-->
<main>



 <div style="height: 100vh">
    <div class="flex-center flex-column">

        <div class="alert alert-danger" id="errormsg" role="alert" style="width:300px; margin:0px auto;display:none;">
          <strong>{{m}}</strong>
        </div>
       
       <div class="col-md-5">
            
                <form class="lForm z-depth-3" style="padding:20px;">

                   

                    <div class="md-form" >
                           <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" ng-model="username" id="username" class="form-control" />
                            <label for="username">username</label>
                    </div>

                    <div class="md-form" >
                           <i class="fa fa-lock prefix grey-text"></i>
                            <input type="password" ng-model="password" id="upassword" class="form-control" />
                            <label for="username">upassword</label>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-#c62828 red darken-3" ng-click="login();">login <i class="fa fa-unlock-alt" aria-hidden="true"></i></button>
                        <button class="btn btn-#c62828 red darken-3"><a href="#!/signup">sign up</a> </button>
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
