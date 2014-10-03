<?php
include_once('table_constants.php');
/*
echo "<table cellspacing=\"0\" cellpadding=\"0\" 
style=\"width:100%;\"> <tr><td>1</td><td>2</td><td>3</td><td>4</td></tr></table>";
*/
//[ ... DB connection code here ... ]
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
/*
if (isset($_GET)) {
		echo(json_encode($_GET));
} else {
	echo("<br>what?</br>");
}
 */
$textout = "";
if (isset($_GET)) {
		$sql = "SELECT * FROM test.contacts ORDER BY ".$_GET['column']." ".$_GET['direc']." ";
		//echo($sql);
	$result = mysql_query($sql);
	echo(mysql_error());
	while ($myrow = mysql_fetch_array($result)) {
		$agentid = $myrow["ContactID"];
		$agentname = $myrow["ContactFullName"];
		$agentsalut = $myrow["ContactSalutation"];
		$agentinttel = $myrow["ContactTel"];
		$textout .= "<tr>
		<td class='col1_width' >" . $agentid . "</td>
		<td  class='col1_width'>" . $agentname . "</td>
		<td  class='col1_width'>" . $agentsalut . "</td>
		<td  class='col1_width'>" . $agentinttel . "</td>
		</tr>";
	}
} else {
	$textout = "";
}
echo "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=1 >" . $textout . "</table>";
  
?>
<?php
/*
 * Here we perform a SELECT query on the contact table, using the ORDER BY construct to select both
 * the field to sort and the sort direction. The information is processed into HTML code
 * for the table which is to form the 'body' part of our data grid, ready to be written
 * straight into our document. This is handled by our handleHttpResponse() function:
 */
?>