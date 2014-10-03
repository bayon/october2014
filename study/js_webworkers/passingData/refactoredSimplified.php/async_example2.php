<?php echo(__FILE__); ?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8"  />
		<title>MDN Example - Queryable worker</title>
		<script type="text/javascript">
			function QueryableWorker(sURL, fDefListener, fOnError) {
				var oInstance = this, oWorker = new Worker(sURL), oListeners = {};
				this.defaultListener = fDefListener ||
				function() {
				};
				oWorker.onmessage = function(e) {
					if (e.data instanceof Object && e.data.hasOwnProperty("vo42t30") && e.data.hasOwnProperty("rnb93qh")) {
						oListeners[e.data.vo42t30].apply(oInstance, e.data.rnb93qh);
					} else {
						this.defaultListener.call(oInstance, e.data);
					}
				};
				if (fOnError) {
					oWorker.onerror = fOnError;
				}
				this.sendQuery = function(/* queryable function name, argument to pass 1, argument to pass 2, etc. etc */) {
					if (arguments.length < 1) {
						throw new TypeError("QueryableWorker.sendQuery - not enough arguments");
						return;
					}
					oWorker.postMessage({
						"bk4e1h0" : arguments[0],
						"ktp3fm1" : Array.prototype.slice.call(arguments, 1)
					});
				};
				this.postMessage = function(vMsg) {
					Worker.prototype.postMessage.call(oWorker, vMsg);
				};
				this.terminate = function() {
					Worker.prototype.terminate.call(oWorker);
				};
				this.addListener = function(sName, fListener) {
					oListeners[sName] = fListener;
				};
				this.removeListener = function(sName) {
					delete oListeners[sName];
				};
			};

			var oQueryableWorker = new QueryableWorker("my_task.js" /* , yourDefaultMessageListenerHere [optional], yourErrorListenerHere [optional] */);
			// "listeners"
			oQueryableWorker.addListener("printSomething", function(nResult) {
				document.getElementById("firstLink").parentNode.appendChild(document.createTextNode(" The difference is " + nResult + "!"));
			});
			oQueryableWorker.addListener("alertSomething", function(nDeltaT, sUnit) {
				alert("Worker waited for " + nDeltaT + " " + sUnit + " :-)");
			});

		</script>
	</head>
	<body>
		<ul>
			<li>
				<a id="firstLink" href="javascript:oQueryableWorker.sendQuery('getDifference', 5, 3);"> What is the difference between 5 and 3? </a>
			</li>
			<li>
				<a href="javascript:oQueryableWorker.sendQuery('waitSomething');">Wait 3 seconds</a>
			</li>
			<li>
				<a href="javascript:oQueryableWorker.terminate();">terminate() the Worker</a>
			</li>
		</ul>
	</body>
</html>
<?php
/*
 QueryableWorker instances methods:
 * sendQuery(queryable function name, argument to pass 1, argument to pass 2, etc. etc): calls a Worker's queryable function
 * postMessage(string or JSON Data): see Worker.prototype.postMessage()
 * terminate(): terminates the Worker
 * addListener(name, function): adds a listener
 * removeListener(name): removes a listener
 QueryableWorker instances properties:
 * defaultListener: the default listener executed only when the Worker calls the postMessage() function directly
 */
 
 //I just think there is no need to use call() method
					//how about just oWorker.postMessage(vMsg);
					//the same situation with terminate
					//well,just a little faster,no search up the prototye chain
?>
