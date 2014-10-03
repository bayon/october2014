<?php

$array = array(
 array(
	"header"=>"NAME COLUMN",
	"value" => " Joe Schubernacher"
	),
	 array(
	"header"=>"PHONE",
	"value" => "555-444-1423"
	)
);
echo("<pre>");
print_r($array);

$table = "<table border='1' width=100% >";
$table .= "<tr>";
foreach($array as $col){
	$table .= "<th>".$col['header']."</th>";
}
$table .= "</tr>";
$table .="<tr>";
foreach($array as $col){
	$table .= "<td>".$col['value']."</td>";
}
$table .= "</tr>";
$table .= "</table>";
echo($table);


?>