<?php
include_once('curl_functions.php');
 
if (isset($_POST)) {
	$_POST['secret'] = "!9966youllNeverKnowEat1100!";
	echo("<br>Post:" . curl_post("http://localhost/GlobalDev/global_api/api_1.php", $_POST));
	print_r($_POST);
}

if (isset($_GET)) {
	echo("<br>Get:" . curl_post("http://localhost/GlobalDev/global_api/api_1.php", $_GET));
}
?>

<form method='post' action='<?php $_SERVER['PHP_SELF']?>'>
	<input type='submit' name='method' value='get_users'/>
</form>