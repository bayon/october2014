<?php
include_once("dbconfig.php");
include_once("constants.php");
/*
define("id","invid");
define("invdate","invdate");
define("name","name");
define("amount","amount");
define("tax","tax");
define("total","total");
define("note","note");

class Responce{
	public $page;
	public $total;
	public $records;
	public $rows;
	
	public function __construct($page="1",$total="1",$records="1",$rows=array()){
		$this->page = $page;
		$this->total = $total;
		$this->records = $records;
		$this->rows = $rows;
	}
}
*/
$page = $_GET['page'];
// get the requested page
$limit = $_GET['rows'];
// get how many rows we want to have into the grid
$sidx = $_GET['sidx'];
// get index row - i.e. user click to sort
$sord = $_GET['sord'];
// get the direction
if (!$sidx)
	$sidx = 1;
// connect to the database
$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Connection Error: " . mysql_error());

mysql_select_db($database) or die("Error conecting to db.");



$result = mysql_query("SELECT COUNT(*) AS count FROM invheader a, clients b WHERE a.client_id=b.client_id");
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$count = $row['count'];

if ($count > 0) {
	$total_pages = ceil($count / $limit);
} else {
	$total_pages = 0;
}
if ($page > $total_pages)
	$page = $total_pages;
$start = $limit * $page - $limit;
// do not put $limit*($page - 1)
$SQL = "SELECT a.invid, a.invdate, b.name, a.amount,a.tax,a.total,a.note FROM invheader a, clients b WHERE " . " a.client_id=b.client_id ORDER BY $sidx $sord LIMIT $start , $limit";
//echo("<br>".$SQL);
$result = mysql_query($SQL) or die("Couldnt execute query." . mysql_error());
?>