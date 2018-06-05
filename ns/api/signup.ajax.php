<?php
require_once("model.php");
$_POST = json_decode( file_get_contents( 'php://input' ) );

$action = isset($_POST->action)?$_POST->action:'';
	 $_POST->action;
	 //ser null for auto increment id
	 $value ="null".","."'$_POST->firstname'".","."'$_POST->lastname'".","."'$_POST->middlename'".","."'$_POST->contact'".","."'$_POST->email'".","."'$_POST->username'".","."'$_POST->upassword'";
	 //echo $value;
	$insert= new apiFunction;
	$CheckUser = $insert->CheckUserExist($_POST->username);
	if($CheckUser->num_rows>0){
		echo"username exist!";
	}else{
		$CheckEmail = $insert->CheckEmail($_POST->email);
		if($CheckEmail->num_rows>0){
			echo"email exist!";
		}else{
			$insert->_insert("usertable",$value);
			if($insert){
				echo"success";
			}else{
				echo"failed!";
			}
		}
	}
	

?>