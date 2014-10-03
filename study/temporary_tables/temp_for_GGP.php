<?php
echo(__FILE__);
//$db = new Database();
$con = mysqli_connect("localhost", "root", "", "test");
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$tempTableSQL = "
 CREATE TEMPORARY TABLE temp_table_1 (
      `id` int NOT NULL,
    `name` text,
      `description` text,
      PRIMARY KEY(`id`)
    )";

//$db -> queryCmd($tempTableSQL);
$res = mysqli_query($con, $tempTableSQL);

$sql_selectInto1 = "
	 SELECT INTO temp_table_1 (id,name,description) 
	 SELECT (id,name,description) 
	 FROM test.sandbox 
	 WHERE description 
	 LIKE 'jack%';
	 ";

$sql_selectInto2 = "
	 
	 SELECT (id,name,description) 
	 INTO 
	 temp_table_1
	 FROM test.sandbox 
	  
	 ";

//$db -> queryCmd($sql_selectInto);
$res2 = mysqli_query($con, $sql_selectInto2);
$viewResults1 = "
SELECT * FROM temp_table_1;
";
// mysqli_query($con, $viewResults1);
$res3 = mysqli_query($con, $viewResults1);
while ($row = mysqli_fetch_array($res3)) {
	//echo $row['FirstName'] . " " . $row['LastName'];
	$data[] = $row;
}
print_r($data);
$dbh = null;
?>