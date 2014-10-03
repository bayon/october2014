<?php
echo(__FILE__);
?>
<html>
	<head>
		<script type='text/javascript' src='latest_jquery.js'></script>
	</head>
	<body>
		<select id="friendList">
			<option value="winter">Winter</option>
			<option value="moonbeam">MoonBeam</option>
			<option value="spondon">Spondon</option>
			<option value="bennyb">BennyB</option>
		</select>
		<div id="ajax_response">
			<!-- ajax response here -->
		</div>
	</body>
</html>
<script>
	console.log("javascript is working is this is in the console");
	$(document).ready(function() {
		console.log('jq is on...');
		$("#friendList").change(function() {
			console.log("Event Called: friendList selection");
			jQuery.ajax({
				url : "ajax_backend.php",
				type : "POST",
				data : {
					"name" : $(this).val(),
					"datasource" : "mysql"
				},
				success : function(rtndata) {
					console.log(rtndata);
					$("#ajax_response").html("<pre>" + rtndata + "</pre>");
					var json = rtndata;
					//convert json string into js object. FOR POST OR GET DATA
					var friend_obj = JSON.parse(json);
					alert(friend_obj.name);

					// FOR MYSQL DATA:
					alert(json);
					var ejson = eval(json);
					
					for (var key in ejson) {
						if (ejson.hasOwnProperty(key)) {
							console.log(ejson[key]["id"]);
							console.log(ejson[key]["name"]);
						}
					}
				}
			});
		});
	}); 
</script>
