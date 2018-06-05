<?php
require_once("model.php");
$post= json_decode( file_get_contents( 'php://input' ) );

$action = isset($post->action)?$post->action:'';
if($action == 'save'):

$value= "null".","."'$post->description'".","."'$post->amount'".","."now()";
//echo $value;
		$l = new apiFunction;
		$l->_insert("suppliertable",$value);
		if($l)
		{
		echo"success";
		}
endif;	



?>