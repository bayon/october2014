<!DOCTYPE html>
<html>
	<head>
		<title>Web Worker Example with XHR Request | TechSlides</title>
		<style>
			#main {
				position: absolute; left: 0px; top: 8em;
				width: 100px; background: #ffffff; border: 1px solid #ffffff;
			}
		</style>
	</head>
	<body>
		<a href="http://techslides.com/html5-web-workers-for-ajax-requests">web worker article</a>
		<div id="main"> ui working </div>
		<div id="worker"></div>
		<script>
			//Animation function
			function doMove() {
				foo.style.left = parseInt(foo.style.left) + 1 + 'px';
				setTimeout(doMove, 20);
			}
			//start animation
			var foo = document.getElementById('main');
			foo.style.left = '0px';
			doMove();
			//HTML5 Web Workers
			var worker = new Worker('worker.js');
			worker.addEventListener('message', function(e) {
				document.getElementById("worker").textContent = e.data;
			}, false);
			// Send filename to our worker.
			worker.postMessage('foo.php');
		</script>
	</body>
</html>

<!--
	Exchanging JSON
As you can see, only strings can be exchanged between the page creating the web worker, 
and the web worker itself. If you need to exchange JavaScript object, 
you will have to exchange it using JSON strings, using the JSON.stringify() and JSON.parse() functions.

Here is a list of what a web worker can do inside the web worker JavaScript:
Listen for messages, using the onmessage event listener function.
Send messages via the postMessage() function.
Send AJAX requests using the XMLHttpRequest.
Create timers using the setTimeout() and sendInterval() functions.
Web Sockets
Web SQL Databases
Web Workers
Import more scripts using importScripts()
also
The navigator object
The Application Cache

Importing JavaScript in a Web Worker
You can import JavaScript files for use in your web worker, using the importScripts() function. This is a special function available in a web worker. Here is an example:
importScripts("myscript.js");
importScripts("script1.js", "script2.js");

http://tutorials.jenkov.com/html5/web-workers.html
Creating a SharedWorker
You create a SharedWorker like this:
var worker = new SharedWorker("shared-worker.js");
The string passed as parameter to the SharedWorker constructor is 
the URL of the JavaScript the SharedWorker is going to execute.
All pages that create an instance of a SharedWorker with the same URL 
passed as parameter, will essentially get a connection to the same SharedWorker behind the scenes.

http://www.html5rocks.com/en/tutorials/workers/basics/
Transferrable objects

Most browsers implement the structured cloning algorithm, which allows you to pass more 
complex types in/out of Workers such as File, Blob, ArrayBuffer, and JSON objects. However, 
when passing these types of data using postMessage(), a copy is still made. Therefore, 
if you're passing a large 50MB file (for example), there's a noticeable overhead in getting 
that file between the worker and the main thread.



-->