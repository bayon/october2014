<?php

include_once ("../dbconfig.php");
// connect to the database
$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Connection Error: " . mysql_error());

mysql_select_db($database) or die("Error conecting to db.");

$page = $_GET['page'];
$page=1;
// get the requested page
$limit = $_GET['rows'];
$limit =10;
// get how many rows we want to have into the grid
$sidx = $_GET['sidx'];
$sidx = "invid";
// get index row - i.e. user click to sort
$sord = $_GET['sord'];
$sord = "invid";
// get the direction
if (!$sidx)
	$sidx = 1;

/////////////////////////
$result = mysql_query("SELECT COUNT(*) AS count FROM invheader a, client b WHERE a.client_id=b.client_id");
$row = mysql_fetch_array($result, MYSQL_ASSOC);//, MYSQL_ASSOC
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


	$start = 0;


$SQL = "SELECT a.invid, a.invdate, b.name, a.amount,a.tax,a.total,a.note FROM invheader a, client b WHERE a.client_id=b.client_id ORDER BY $sord LIMIT  $limit";
echo($SQL);
$result = mysql_query($SQL) or die("--!!!---Couldn t execute query." . mysql_error());

//$responce -> page = $page;
//$responce -> total = $total_pages;
//$responce -> records = $count;
$i = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$responce -> rows[$i]['id'] = $row[id];
	$responce -> rows[$i]['cell'] = array($row[id], $row[invdate], $row[name], $row[amount], $row[tax], $row[total], $row[note]);
	$i++;
}
echo json_encode($responce);
?>