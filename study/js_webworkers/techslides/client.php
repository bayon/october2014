<!DOCTYPE html>
<html>
	<head>
		<title>Web Worker Example with XHR Request | TechSlides</title>
		<style>
			#main {
				/* simple box */
				position: absolute;
				left: 0px;
				top: 8em;
				width: 250px;
				line-height: 3em;
				background: #99ccff;
				border: 1px solid #003366;
				white-space: nowrap;
				padding: 0.5em;
			}
		</style>

	</head>
	<body>
		<a href="http://techslides.com/html5-web-workers-for-ajax-requests">Back to Article</a>
		<div id="main">
			Simple JavaScript Animation Example
		</div>
		<div id="worker"></div>
		<script>
			//simple JS Animation
			function doMove() {
				foo.style.left = parseInt(foo.style.left) + 1 + 'px';
				setTimeout(doMove, 20);
				// call doMove in 20msec
			}

			//start the animation
			var foo = document.getElementById('main');
			foo.style.left = '0px';
			doMove();
			// start animating

			//HTML5 Web Workers
			var worker = new Worker('worker.js');
			worker.addEventListener('message', function(e) {
				document.getElementById("worker").textContent = e.data;
			}, false);
			worker.postMessage('foo.json');
			// Send filename to our worker.
		</script>
	</body>
</html>