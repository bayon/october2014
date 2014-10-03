<?php echo(__FILE__); ?>
 
<script>
	var worker = new Worker("SavePerson.js");

	worker.addEventListener("message", function(e) {
		alert(e.data);
	});

	worker.postMessage("Jamesx Bond"); 
</script>