<?php
include_once ("../dbconfig.php");
$examp = $_GET["q"];
$id = $_GET["id"];

print_r($_GET);
$responce = new Responce();
//WTF? $page = $_GET['page'];
$page = 1;
// get the requested page
//WTF !  $limit = $_GET['rows'];
$limit = 5;
// get how many rows we want to have into the grid
// WTF!  $sidx = $_GET['sidx'];
$sidx = "num";
// get index row - i.e. user click to sort
//WTF! $sord = $_GET['sord'];
$sord = "asc";
// get the direction
if (!$sidx)
	$sidx = 1;
// connect to the database
$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Connection Error: " . mysql_error());

mysql_select_db($database) or die("Error conecting to db.");

switch ($examp) {
	case 1 :
		$result = mysql_query("SELECT COUNT(*) AS count FROM invlines WHERE invid=" . $id);
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
		if ($start < 0)
			$start = 0;
		$SQL = "SELECT num, item, qty, unit FROM invlines WHERE invid=" . $id . " ORDER BY $sidx $sord LIMIT $start , $limit";
		$result = mysql_query($SQL) or die("Couldnt execute query." . mysql_error());
		$responce -> page = $page;
		$responce -> total = $total_pages;
		$responce -> records = $count;
		$i = 0;
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$responce -> rows[$i]['id'] = $row[num];
			$responce -> rows[$i]['cell'] = array($row[num], $row[item], $row[qty], $row[unit], number_format($row[qty] * $row[unit], 2, '.', ' '));
			$i++;
		}
		echo json_encode($responce);

		break;
}
?>