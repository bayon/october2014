<?php echo(__FILE__);
if (isset($_POST)) {
	echo("<br>POST</br>");
	var_dump($_POST);
}
if (isset($_GET)) {
	echo("<br>GET</br>");
	var_dump($_GET);
}
?>
<form name=myform>
	<input type=button value="IMPORTANT USER ACTION"
	onClick="if(confirm('Are you sure?'))
	{ verify();}
	else { deny();}">
</form>

<form name="js_activated_form" method ='post' action="js_form_submission.php">
	<input type='hidden' name='method' value='important_user_action'/>
	<input type='text' name='query' />
	 
</form>
<script type="text/javascript">
	function submitform() {
		document.js_activated_form.submit();
	}

	function verify() {
		alert("you confirmed!");
		submitform();

	}

	function deny() {
		alert("you denied");
	}

</script>

