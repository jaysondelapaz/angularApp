<?php



$data = json_decode(file_get_contents("php://input"));

$search = $data->searchText;

// Fetch 5 records
$mysqli = new mysqli("localhost","root","vertrigo","numinousdb")or die($mysqli->error);
$sel = $mysqli->query("select * from producttable where productCode like '%".$search."%' limit 5");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
 $data[] = array("productCode"=>$row['productCode']);
}

echo json_encode($data);