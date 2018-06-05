<?php
require_once("model.php");
$insert = new apiFunction;
$post = json_decode(file_get_contents( 'php://input' ));
$action = isset($post->action)? $post->action:'';
if($post->action == 'Addproduct')
{
$value= "'$post->ProductCode'".","."'$post->ProductName'".","."'$post->category'".","."'$post->srp1'".","."'$post->srp2'";

$insert->_insert("producttable",$value);
		if($insert):
			echo"success";
		else:
			echo"failed";
		endif;
}


if($post->action == 'Delete'){
$insert->delete("producttable","productCode","$post->uid");
echo"success";
}




?>