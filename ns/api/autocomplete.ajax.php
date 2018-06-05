<?php

$mysqli = new mysqli("localhost","root","vertrigo","numinousdb") or die($mysqli->error);
$post= json_decode( file_get_contents( 'php://input' ) );


$search = $post->searchText;

$sel = $mysqli->query("select * from producttable where productCode like '%".$search."%' ")or die($mysqli->error);
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array("productCode"=>$row['productCode']);
}

echo json_encode($data);
