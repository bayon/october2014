<?php
//echo(__FILE__);
include_once("../dbconfig.php");
// connect to the database
$db = mysql_connect($dbhost, $dbuser, $dbpassword)
or die("Connection Error: " . mysql_error());

mysql_select_db($database) or die("Error conecting to db.");
$result = mysql_query("SELECT * FROM globaldev.invheader ");
//$row = mysql_fetch_array($result,MYSQL_ASSOC);
$row = mysql_fetch_assoc($result);
//print_r($row);

$i=0;
//while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
while($row = mysql_fetch_assoc($result)) {
    $responce->rows[$i]['id']=$row['invid'];
    $responce->rows[$i]['cell']=array($row['invid'],$row['invdate'],$row['client_id'],$row['amount'],$row['tax'],$row['total'],$row['note']);
    $i++;
}        
echo json_encode($responce);
////////////////////
/*
$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction
if(!$sidx) $sidx =1;



mysql_select_db($database) or die("Error conecting to db.");
$result = mysql_query("SELECT COUNT(*) AS count FROM globaldev.invheader a, client b WHERE a.client_id=b.client_id");
//$row = mysql_fetch_array($result,MYSQL_ASSOC);
$row = mysql_fetch_assoc($result);
$count = $row['count'];

if( $count >0 ) {
	$total_pages = ceil($count/$limit);
} else {
	$total_pages = 0;
}
if ($page > $total_pages) $page=$total_pages;
$start = $limit*$page - $limit; // do not put $limit*($page - 1)
$SQL = "SELECT a.client_id, a.invdate, b.name, a.amount,a.tax,a.total,a.note FROM invheader a, client b WHERE a.client_id=b.client_id ";//ORDER BY $sidx $sord LIMIT $start , $limit
echo($SQL);
$result = mysql_query( $SQL ) or die("<br> --!!!--Couldn t execute query.".mysql_error());
echo("<br>".$result);

$responce->page = 1;//$page
$responce->total = 1;//$total_pages
$responce->records = 10;//$count

$i=0;
//while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
while($row = mysql_fetch_assoc($result)) {
    $responce->rows[$i]['id']=$row[id];
    $responce->rows[$i]['cell']=array($row[id],$row[invdate],$row[name],$row[amount],$row[tax],$row[total],$row[note]);
    $i++;
}        
echo json_encode($responce);
 * */
 
?>