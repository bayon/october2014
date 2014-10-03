<?php
include_once('cc_jqgrid_server_head.php');
 
$responce = new Responce();
//echo("page:".$page."--total pages:".$total_pages."--count:".$count);
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;
$i=0;
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
    $responce->rows[$i]['pk']=$row["pk"];
    $responce->rows[$i]['cell']=array($row["pk"],$row["id"],$row["code"],$row["statement"]);
    $i++;
}        
echo json_encode($responce);
?>