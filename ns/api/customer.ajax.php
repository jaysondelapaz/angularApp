<?php
require_once("model.php");
$post= json_decode( file_get_contents( 'php://input' ) );

$action = isset($post->action)?$post->action:'';
if($action == 'Addcustomer'):

$value= "null".","."'$post->firstName'".","."'$post->lastName'".","."'$post->middleName'".","."'$post->Gender'".","."'$post->Address'".","."'$post->Contact'".","."'$post->rrp1'".","."'$post->rrp2'";
//echo $value;
		$l = new apiFunction;
		$l->_insert("customertable",$value);
		if($l)
		{
		echo"success";
		}
endif;	



?>