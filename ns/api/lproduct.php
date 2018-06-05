<?php
require_once("model.php");
$n = new apiFunction;
$get = $n-> selectProduct();

$output = array();
while($row= $get->fetch_object()){
	$output[] = $row;
}
//header('Content-Type: application/json');

echo json_encode($output);
?>