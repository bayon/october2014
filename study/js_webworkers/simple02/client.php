<?php echo(__FILE__); ?>
 <div id="ajaxed">HERE</div>
<script>
	var worker = new Worker("SavePerson.js");

	worker.addEventListener("message", function(e) {
		alert(e.data);
	});


var jsonData = {"dataString":"jimbeam","controller":"handler.php","receiverId":"ajaxed"};

	//worker.postMessage("Jamesx Bond"); 
	worker.postMessage(jsonData); 
</script>