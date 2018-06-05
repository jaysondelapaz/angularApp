<?php
	
/*$mysqli = new mysqli("localhost","root","vertrigo","numinousdb") or die($mysqli->error);
	$_POST = json_decode( file_get_contents( 'php://input' ) );

$action = isset($_POST->action)?$_POST->action:'';

if($_POST->action == 'sProduct'){
	$id = $_POST->keyWord;
		$get = $mysqli->query("SELECT * FROM customertable WHERE cid='$id'") or die($mysqli->error);

		$data = array();

while ($row = mysqli_fetch_array($get)) {
    $data[] = $row;
}

echo json_encode($data);
} */


$mysqli = new mysqli("localhost","root","vertrigo","numinousdb") or die($mysqli->error);
$post = json_decode(file_get_contents('php://input'));

$l = $post->order;
//var_dump($l);


    foreach ((array)$l as  $value)
    {
    	$product = $value->ProductCode;	
    	$ml = $value->ML;
    	$price = $value->Price;
    	$qty = $value->Qty;
    	$total = $value->total;
    	echo $product." ".$ml." ".$price." ".$qty." ".$total;

	$insert = $mysqli->query("INSERT INTO ordertabledtl VALUES('$product','$ml','$price','$qty','$total')")or die($mysqli->error);
	
} 

?>