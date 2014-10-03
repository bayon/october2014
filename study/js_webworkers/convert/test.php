<!DOCTYPE html>
<html>
	<head>
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<title>Worker Sample</title>

	</head>
	<body>
		<form>
			<input id='random' type='text'  name='email' value='joe@sixpack.com'>
			</input>
			<input  type='submit'/>
			<button id='target' >
				go
			</button>
		</form>
		<div id="MyBadge"></div>
	</body>
<html>
	<script type="text/javascript">
		/*this just restarts the page....
		 function submitForm(){
		 worker.postMessage({
		 'email' : email
		 });

		 }*/
		$("#target").click(function() {
			alert("Handler for .click() called.");

		});
		$(document).ready(function() {
			var worker = new Worker("test.js");
			worker.onmessage = workerResultReceiver;
			worker.onerror = workerErrorReceiver;
			var email = document.getElementById('random').value;
			alert(email);
			worker.postMessage({
				'email' : email
			});

			function workerResultReceiver(e) {
				$('#MyBadge').html(e.data);
			}

			function workerErrorReceiver(e) {
				console.log("there was a problem with the WebWorker within " + e);
			}

		});
	</script>
