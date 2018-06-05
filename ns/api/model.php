<?php
require_once("config.php");

class apiFunction extends DB{
	public $_sql;
	public $mysqli;

	public function __construct(){
		$this->mysqli = new mysqli($this->host,$this->user,$this->passwd,$this->db) or die($mysqli->error);	
			//echo"Successfully connected";	
	}

	//check username if exist
	public function CheckUserExist($username){
		$this->_sql = $this->mysqli->query("SELECT username FROM usertable WHERE username = '$username'")or die($this->mysqli->error);
		//echo "success";
		return $this->_sql;
	}

    //check email if exist
	public function CheckEmail($email){
		$this->_sql = $this->mysqli->query("SELECT email FROM usertable WHERE email = '$email'") or die($this->mysqli->error);
		return $this->_sql;
	}

	//insert data
	public function _insert($table,$value){
		$this->_sql = $this->mysqli->query("INSERT INTO $table VALUES($value)")or die($this->mysqli->error);
		return $this->_sql;
	}

	//login
	public function isLogin($username,$password){
		$this->_sql = $this->mysqli->query("SELECT username, password FROM usertable WHERE username='$username' AND password='$password'")or die($this->mysqli->error);
		return $this->_sql;
	}

	//public select data
	public function _select($table){
		$this->_sql = $this->mysqli->query("SELECT * FROM $table")or die($this->mysqli->error);
		return $this->_sql;
	}

	public function selectProduct(){
		$this->_sql = $this->mysqli->query("SELECT categorytable.categoryname as categoryname,producttable.productCode as productCode, producttable.productName as productName, producttable.categoryID as cid, producttable.srp1 as srp1 FROM producttable LEFT JOIN categorytable ON producttable.categoryID = categorytable.categoryID ")or die($this->mysqli->error);
		return $this->_sql;
	}

	public function selectID($table,$column){
		$this->_sql = $this->mysqli->query("SELECT $column FROM $table  ORDER BY $column DESC LIMIT 1")or die($this->mysqli->error);
		return $this->_sql;
	}

	public function selectprice($table,$column,$id){
		$this->_sql = $this->mysqli->query("SELECT * FROM $table WHERE $column ='$id' ")or die($this->mysqli->error);
		return $this->_sql;
	}


	public function searchWhere($table,$id){
		$this->_sql = $this->mysqli->query("SELECT * FROM $table WHERE cid='$id' LIMIT 1 ")or die($this->mysqli->error);
		return $this->_sql;
	}

	public function selectCustomerName($table,$id,$ids){
		$this->_sql = $this->mysqli->query("SELECT * FROM $table WHERE $id='$ids' ")or die($this->mysqli->error);
		return $this->_sql;
	}



	//get order 
	public function displayOrder(){
		$this->_sql = $this->mysqli->query("SELECT hdr.oid as orderid, hdr.description as description, CONCAT(customertable.cname,' ', customertable.clastname) as name, sum(dtl.price) as price, sum(dtl.qty) as qty, sum(dtl.total) as total,
			sum((qty * product.srp2)) as totalsp, (sum(dtl.total) - sum((qty * product.srp2))) as profit
			FROM ordertablehdr as hdr 
			LEFT JOIN customertable ON hdr.cid = customertable.cid 
			LEFT JOIN ordertabledtl as dtl ON hdr.oid = dtl.oid 
			LEFT JOIN producttable as product ON dtl.productCode = product.productCode GROUP BY orderid")or die($this->mysqli->error);
		return $this->_sql;
	}




	//*******************************DELETE******************************
	public function delete($table,$id,$ids){
		$this->_sql = $this->mysqli->query("DELETE FROM $table WHERE $id = '$ids'")or die($this->mysqli->error);
		return $this->_sql;
	}
}
$d = new apifunction;

?>