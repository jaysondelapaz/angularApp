<?php
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
$mysqli = new mysqli("localhost","root","vertrigo","numinousdb") or die($mysqli->error);
$post = json_decode(file_get_contents('php://input'));

$id = $_REQUEST['id'];
//$id=2;
//$get = $mysqli->query("SELECT * FROM ordertablehdr WHERE oid='$id'") or die($mysqli->error);
$get= $mysqli->query("SELECT * from producttable where productCode='$id'")or die($mysqli->error);

$outp = "";
while($rs = $get->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"ProductCode":"'  . $rs["productCode"] . '",';
    $outp .= '"productName":"'   . $rs["productName"]  . '",';
    $outp .= '"categoryID":"'   . $rs["categoryID"] . '",';
    $outp .= '"srp1":"'   . $rs["srp1"] . '",';
    $outp .= '"srp2":"'. $rs["srp2"]     . '"}';
}
$outp ='{"Precords":['.$outp.']}';
echo($outp);

?>