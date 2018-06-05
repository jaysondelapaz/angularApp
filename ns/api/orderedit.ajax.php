<?php
require_once('model.php');
$mysqli = new mysqli("localhost","root","vertrigo","numinousdb") or die($mysqli->error);
$post= json_decode(file_get_contents('php://input'));
$action = isset($post->action)? $post->action:'';
if($post->Urecords == []){
	$delete=$mysqli->query("DELETE FROM ordertablehdr WHERE oid='$post->key'")or die("error while deleting data".$mysqli->error);
	$delete = $mysqli->query("DELETE FROM ordertabledtl WHERE oid='$post->key' ")or die($mysqli->error);
		echo"All records deleted";	
}else{
	
	if($post->action=='Update'):
			$a = new apiFunction;
		$delete = $mysqli->query("DELETE FROM ordertabledtl WHERE oid='$post->key' ")or die($mysqli->error);
		//var_dump($post->Urecords);
		foreach((array)$post->Urecords as $value){
			$pCode =  trim($value->productCode);
			$ml =  trim($value->ML);
			$price =  trim($value->price);
			$qty =  trim($value->qty);
			$total =  trim($value->totals);
			$orderID = trim($value->orderid);
			
			$insert = $mysqli->query("INSERT INTO ordertabledtl VALUES('$post->key', '$value->productCode', '$ml', '$price', '$qty', '$total')")or die($mysqli->error);
			
		}
		$error=$mysqli->error;
		if($error == ""){
			echo"success";
		}else{
			echo"error";
		}

	endif;

}
?>

