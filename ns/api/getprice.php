<?php
require_once("model.php");
$post = json_decode(file_get_contents( 'php://input' ));
$action = isset($post->action)? $post->action:'';

$output = "";
if($post->action == 'getPrice'){
	$b = new apiFunction;
	$output = array();
	$price = $b->searchWhere("customertable",$post->customer);
	while($row = $price->fetch_object()){
		$output = $row;
		//$output= $row->rrp2;
		 //$output[] = array("rrp1"=>$row['rrp1'], "productName"=>$row['productName']);
	}
	//$data =htmlentities(serialize($output)); 
	//$data2 = json_decode(json_encode($data));
	echo json_encode($output);
	
}
?>