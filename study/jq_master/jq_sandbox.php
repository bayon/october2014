

<html>
	<head>
		<script type='text/javascript' src='js/latest_jquery.js'></script>
	</head>
	<body>
		<form id="myForm" >
			<input type="hidden" id="controller" name="controller" value="myController.php"/>
			<textarea id="myTextarea" name="myTextarea" ></textarea>
			<input type="text" id="myText" name="myText" />
			<button onclick="getData();" id="myButton" name="myButton" >click</button>
		</form>
	</body>
</html>
<?php

?>
<script>
	$(document).ready(function() {
		console.log("ready!");

	});
	function getData() {
		alert('get data');
		var myData = $("form#myForm").serialize();
		alert(myData);
	}
</script>