<?php
function connect() {
	mysql_connect('localhost', 'root', '');
}
function getData($table_name) {
	connect();
	$sql = "select * from tickets.$table_name";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)) {
		$data[] = $row;
	}
	return $data;
}
if (isset($_POST)) {

	//echo(json_encode($data));
	if ($_POST['datasource'] == "mysql") {
		$data = getData("command_types");
		echo(json_encode($data));
	} else {
		echo(json_encode($_POST));
	}

} else {
	echo("<br>what?</br>");
}
?>