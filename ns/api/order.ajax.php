<?php
require_once('model.php');

$post= json_decode(file_get_contents('php://input'));
$action = isset($post->action)? $post->action:'';
if($post->action=='insertRecord'):
	$value = "null".","."'$post->description'".","."'$post->Customer'".","."now()".","."'admin'";
	
	$i = new apiFunction;
	$inserthdr = $i->_insert("ordertablehdr",$value);
	$d=$i->selectID("ordertablehdr","oid");
	while($row = $d->fetch_object()){
		$hid = $row->oid;

	}
	


	//$l = $post->order;
    foreach ((array)$post->order as  $value)
    {
    	$product = $value->ProductCode;	
    	$ml = $value->ML;
    	$price = $value->Price;
    	$qty = $value->Qty;
    	$total = $value->total;
    	$value1="'$hid'".","."'$value->ProductCode'".","."'$value->ML'".","."'$value->Price'".","."'$value->Qty'".","."'$value->total'";
    	$insertdtl = $i->_insert("ordertabledtl",$value1);
		
    	//echo $product." ".$ml." ".$price." ".$qty." ".$total;	
	} 

	if(!$inserthdr || !$insertdtl){
			echo"Saving failed!";
		}else{
			echo"success";
		} 
	//$value1 ="'$hid'".","."'$post->product'".","."'$post->ML'".","."'$post->price'".","."'$post->qty'".","."'$post->Total'";
	

//echo"success";
endif;


if($post->action == 'LaodCustomerPrice'):
	$mysqli = new mysqli("localhost","root","vertrigo","numinousdb") or die($mysqli->error);

	$get= $mysqli->query("SELECT * FROM producttable WHERE productCode='$post->id' ")or die($mysqli->error);
		$outp = "";
	while($rs = $get->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"Price":"'  . $rs["srp1"] . '"}';
	    
	}

	$outp ='{"loadprice":['.$outp.']}';
	echo($outp);
endif;
?>