<?php
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
$mysqli = new mysqli("localhost","root","vertrigo","numinousdb") or die($mysqli->error);
$post = json_decode(file_get_contents('php://input'));

$id = $_REQUEST['id'];
//$id=2;
//$get = $mysqli->query("SELECT * FROM ordertablehdr WHERE oid='$id'") or die($mysqli->error);
$get= $mysqli->query("SELECT hdr.oid as oid, hdr.description as description, hdr.cid as cid, c.cname as name, c.clastname as lastname
FROM ordertablehdr as hdr
LEFT JOIN customertable as c ON hdr.cid=c.cid
WHERE hdr.oid='$id'")or die($mysqli->error);

$outp = "";
while($rs = $get->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"description":"'  . $rs["description"] . '",';
    $outp .= '"oid":"'   . $rs["oid"]  . '",';
    $outp .= '"name":"'   . $rs["name"] . '",';
    $outp .= '"lastname":"'   . $rs["lastname"] . '",';
    $outp .= '"cid":"'. $rs["cid"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
echo($outp);

?>