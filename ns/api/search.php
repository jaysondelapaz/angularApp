<?php
require_once("model.php");

/*$post = json_decode(file_get_contents( 'php://input' ));

$term=$post->term;
      $s = new apiFunction;
		$query = $s->_search("producttable",$term);
      while ($row = $query->fetch_array(MYSQLI_BOTH))
            {
             $resultData[] = $row['productCode'];
            }
            echo json_encode($resultData);
*/
           

  //autocomplete for ItemID
  if($_POST['searchBy'] == 'ProductCode')
    {
      $term=$_POST['term'];
      $s = new apiFunction;
		$query = $s->_search("producttable",$term);
      while ($row = $query->fetch_array(MYSQLI_BOTH))
            {
             $resultData[] = $row['productCode'];
            }
            echo json_encode($resultData);
    } 



/*
$post = json_decode(file_get_contents( 'php://input' ));
$action = isset($post->action)? $post->action:'';
if($action == 'searchCode'){
	


$key = $post->txtsearch;
$s = new apiFunction;
$sel = $s->_search("producttable",$key);
$data = array();

while ($row = mysqli_fetch_array($sel)) {
 $data[] = array("ProductCode"=>$row['productCode']);
}

echo json_encode($data);
}
*/
?>