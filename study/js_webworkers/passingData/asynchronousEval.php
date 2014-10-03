<?php echo(__FILE__); ?>

<script>
	// Syntax: asyncEval(code[, listener])

	var asyncEval = (function() {

		var aListeners = [], oParser = new Worker("data:text/javascript;charset=US-ASCII,onmessage%20%3D%20function%20%28oEvent%29%20%7B%0A%09postMessage%28%7B%0A%09%09%22id%22%3A%20oEvent.data.id%2C%0A%09%09%22evaluated%22%3A%20eval%28oEvent.data.code%29%0A%09%7D%29%3B%0A%7D");

		oParser.onmessage = function(oEvent) {
			if (aListeners[oEvent.data.id]) {
				aListeners[oEvent.data.id](oEvent.data.evaluated);
			}
			delete aListeners[oEvent.data.id];
		};

		return function(sCode, fListener) {
			aListeners.push(fListener || null);
			oParser.postMessage({
				"id" : aListeners.length - 1,
				"code" : sCode
			});
		};

	})();

	onmessage = function(oEvent) {
		postMessage({
			"id" : oEvent.data.id,
			"evaluated" : eval(oEvent.data.code)
		});
	}
	// asynchronous alert message...
	asyncEval("3 + 2", function(sMessage) {
		alert("3 + 2 = " + sMessage);
	});

	// asynchronous print message...
	asyncEval("\"Hello World!!!\"", function(sHTML) {
		document.body.appendChild(document.createTextNode(sHTML));
	});

	// asynchronous void...
	asyncEval("(function () {\n\tvar oReq = new XMLHttpRequest();\n\toReq.open(\"get\", \"http://www.mozilla.org/\", false);\n\toReq.send(null);\n\treturn oReq.responseText;\n})()"); 
</script>
