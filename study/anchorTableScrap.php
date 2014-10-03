<?php
function createLicenseTable($data) {

	$html = equipmentLicenseCSS();

	$controllerFile = "equipmentLicense.php";
	$html .= "<div class='eq_table_container'>
	<div id='list_header' >Licenses </div>
	<table border=0 cellpadding=0 cellspacing=0   >";
	$headers = array( array("text" => "Equipment Id", "field" => "foreignEquipmentId"), array("text" => "Host Name", "field" => "hostName"), array("text" => "Expiration Date", "field" => "expirationDate"), array("text" => "License Key", "field" => "licenseKey"));
	$previousSearchCriteria = "&licenseKey=" . $_GET['licenseKey'] . "&hostName=" . $_GET['hostName'] . "&expirationDate=" . $_GET['expirationDate'] . "";

	$html .= "<tr>";
	foreach ($headers as $header) {
		$html .= "<th><a href='" . $controllerFile . "?action=sort&sortField=" . $header['field'] . "" . $previousSearchCriteria . "'>" . $header['text'] . "</a>";
	}
	$html .= "<th>View Equipment</th>";
	$html .= "</tr>";

	$rowNum = 0;

	foreach ($data as $record) {
		$html .= "<tr>";
		//define links for each row's data
		$startLink = "<td><br><a href='" . $controllerFile . "?action=select_license&foreignEquipmentId=" . $record['foreignEquipmentId'] . "&expirationDate=" . $record['expirationDate'] . "&hostName=" . $record['hostName'] . "&licenseKey=" . $record['licenseKey'] . "&id=" . $record['id'] . "'  >";
		$endLink = "</a></td>";
		//define the displayed link text
		$html .= $startLink . $record['foreignEquipmentId'] . $endLink;
		$html .= $startLink . $record['hostName'] . $endLink;
		$html .= $startLink . $record['expirationDate'] . $endLink;
		$html .= $startLink . $record['licenseKey'] . $endLink;
		$html .= "<td style='text-align:center;'><a  href='/equipment.phtml?action=view&pkey=" . $record['foreignEquipmentId'] . "'> 
		<img src='/images/ico_view.gif' alt='View Equipment' border='0' ></a></td>";
		$html .= "</tr>";
	}
	$html .= "</table></div>";
	$html .= linkToSearchLicenseForm();
	return $html;

}

function sortLicenseTable($sortField, $licenseKey, $hostName, $expirationDate) {
	$sql = "SELECT * from cid_play.equipmentLicense 
	WHERE 1=1
	AND licenseKey LIKE '%" . $licenseKey . "%'
	AND hostName LIKE '%" . $hostName . "%'
	AND expirationDate LIKE '%" . $expirationDate . "%' 
	ORDER BY " . $sortField . ";";
	$data = getDataFromSQL($sql);
	return $data;

}
?>