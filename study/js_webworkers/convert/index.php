<html>
	<head>
		<?php
		if(isset($_POST)){
			echo("<pre>");print_r($_POST);echo("</pre>");
		}
		?>
	</head>
	<body>
		<?php
		$form = "<form method='post' action='".$_SERVER['PHP_SELF']."' >";
		$form .= "<input id='inputTxt1' type='text' name='text' />";
		
		$form .= "<input   type='submit' name='method' value='submit' ></input>";
		
		$form .= "</form>";
		
		
		echo($form);
		?>
		 <button onClick="fireAjax()" >ajax instead</button>
		<div id="worker"></div>
	</body>
</html>
<script>
function fireAjax(){
	// Send filename to our worker.
	var inputTxt1 = document.getElementById('inputTxt1').value;
	//var data = '{"data":"'+inputTxt1+'","controller":"controller.php"}';
	var jsonData = {"dataString":"jimbeam","url":"controller.php","receiverId":"ajaxed"};
	//alert(data);
	worker.postMessage(jsonData);
	//worker.postMessage("controller.php");
	 console.log('log main ui');
			
}
	//HTML5 Web Workers
			var worker = new Worker('worker.js');
			worker.addEventListener('message', function(e) {
				document.getElementById("worker").textContent = e.data;
			}, false);
			
</script>