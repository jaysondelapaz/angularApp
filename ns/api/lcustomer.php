<?php
require_once("model.php");
$n = new apiFunction;
$get = $n->_select("customertable");

$output = array();
while($row= mysqli_fetch_array($get)){
	$output[] = $row;
}
//header('Content-Type: application/json');

echo json_encode($output);
?>