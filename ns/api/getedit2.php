<?php
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
$mysqli = new mysqli("localhost","root","vertrigo","numinousdb") or die($mysqli->error);
$post = json_decode(file_get_contents('php://input'));

$id = $_REQUEST['id'];
//$id = 34;
$get = $mysqli->query("SELECT dtl.productCode as productCode, dtl.ML as ML, dtl.price as price,
dtl.qty as qty, dtl.total as total, hdr.oid as OrderID FROM ordertablehdr as hdr
LEFT JOIN ordertabledtl as dtl ON dtl.oid = hdr.oid WHERE hdr.oid='$id'") or die($mysqli->error);

$outp = "";
while($rs = $get->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"productCode":"'  . $rs["productCode"] . '",';
 	$outp .= '"orderid":"'   . $rs["OrderID"] . '",';
   	$outp .= '"ML":"'   . $rs["ML"] . '",';
    $outp .= '"price":"' . $rs["price"] . '",';
    $outp .= '"totals":"'. $rs["total"] . '",';
    $outp .= '"qty":"'. $rs["qty"]     . '"}';
}

$outp ='{"details":['.$outp.']}';
echo($outp);

?>