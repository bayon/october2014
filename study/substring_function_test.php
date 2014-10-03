<?php
function stringContainsSubstring($string,$substring){
	//make sure everything is lowercase
		$lowerCaseString = strtolower($string);
		$lowerCaseSubString = strtolower($substring);
		if (strpos($lowerCaseString, $lowerCaseSubString) !== false) {
			return 1;
		}else {
			return 0;
		}
}
$machineType="Cisco Catalyst 29xxStack";
$checkAgainst="Fortinet";
echo(stringContainsSubstring($machineType,$checkAgainst));
if(stringContainsSubstring($machineType,$checkAgainst)){
	echo("<br>yes");
}else{
	echo("<br>no");
}


?>