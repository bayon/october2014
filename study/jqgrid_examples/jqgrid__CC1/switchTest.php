<?php
$array = array("id", "subject", "language", "statement", "listIdentifier", "gradeLevels", "jurisdiction", "jurisdictionAbbreviation", "gradeLevel", "code", "shortCode", "ASN", "CCSS");
foreach($array as $v){
	switch ($v) {
	case $array[$v]:
		echo("<br>foo");
		break;
	
	default:
		echo("<br>no foo");
		break;
}
}

?>