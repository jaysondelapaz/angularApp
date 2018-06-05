<?php
require_once("model.php");
$_POST = json_decode( file_get_contents( 'php://input' ) );

$action = isset($_POST->action)?$_POST->action:'';
if($action == 'login'):
	$l= new apiFunction;
	$login=$l->isLogin($_POST->username,$_POST->password);
	if($login->num_rows>0)
	{
		echo"success";
	}
	else
	{
		echo"invalid";
	}	
endif;


?>