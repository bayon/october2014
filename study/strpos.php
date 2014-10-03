<?php
$string = "the foRtinet thingy is in.";
$substring = "Fortinet";
if(stringContainsSubstring($string,$substring)){
	echo("true");
}else{
	echo("wrong");
}
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
?>