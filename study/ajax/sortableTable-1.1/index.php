<html>
	<?php 
	include_once('table_constants.php');
	/*
	 * Note:
	 * purpose: sorts data by column selected...pretty cool( and via ajax even cooler); 
	 * 1) This is specific to a particular mysql table.
	 * 2) There are a lot of hard coded factors.
	 * 3) currently has no anchor link or other functionality for the data itself.
	 * 
	 * */
	?>
	<script type='text/javascript' src='../latest_jquery.js'></script>
	<body  >

		 

<table cellspacing="0" cellpadding="0"  width=100%  border=1>
	<tr>
		<th  class="col1_width">
		<img id="up1" src="arrows1.png" onClick = "getagents('ContactID','');clearimgs();setupimg('up1');">
		Contact ID
		<img id="down1" src="arrows1.png" onClick = "getagents('ContactID','desc');clearimgs();setdownimg('down1');">
		</th>
		
		<th  class="col1_width">
		<img id="up2" src="arrows1.png" onClick = "getagents('ContactFullName','');clearimgs();setupimg('up2');">
		Contact Name
		<img id="down2" src="arrows1.png" onClick = "getagents('ContactFullName','desc');clearimgs();setdownimg('down2');">
		</th>
		
		<th  class="col1_width">
		<img id="up3" src="arrows1.png" onClick = "getagents('ContactSalutation','');clearimgs();setupimg('up3');">
		Salut
		<img id="down3" src="arrows1.png" onClick = "getagents('ContactSalutation','desc');clearimgs();setdownimg('down3');">
		</th>
		
		<th class="col1_width" >
		<img id="up4" src="arrows1.png" onClick = "getagents('ContactTel','');clearimgs();setupimg('up4');">
		Telephone
		<img id="down4" src="arrows1.png" onClick = "getagents('ContactTel','desc');clearimgs();setdownimg('down4');">
		</th>
		
	</tr>
</table>
<div id="hiddenDIV" style="visibility:hidden; background-color:white;  "></div>		 
<script>
	function clearimgs() {
		//alert('clearimgs');
		/*
		document.getElementById('up1').src = upoff.src;
		document.getElementById('up2').src = upoff.src;
		document.getElementById('up3').src = upoff.src;
		document.getElementById('up4').src = upoff.src;
		document.getElementById('down1').src = downoff.src;
		document.getElementById('down2').src = downoff.src;
		document.getElementById('down3').src = downoff.src;
		document.getElementById('down4').src = downoff.src;
		*/
	}

	function setupimg(thisid) {
		//alert('setupimg');
		/*
		document.getElementById(thisid).src = "up1.gif";
		*/
	}

	function setdownimg(thisid) {
		//alert('setdownimg');
		/*
		document.getElementById(thisid).src = "down1.gif";
		*/
	}
</script>

	</body>
</html>
<script>
	//console.log("javascript is working is this is in the console");
	$(document).ready(function() {
		//console.log('jq is on...');
		jQuery.ajax({
			url : "getagents.php",
			type : "GET",
			data : {
				"column" : "ContactID",
				"direc" : "desc"
			},
			success : function(rtndata) {
				//console.log("return data" + rtndata);
				document.getElementById("hiddenDIV").style.visibility = "visible";
				document.getElementById("hiddenDIV").innerHTML = rtndata;
			}
		});
	});
	// GET AGENTS
	function getagents(column, direc) {
		jQuery.ajax({
			url : "getagents.php",
			type : "GET",
			data : {
				"column" : column,
				"direc" : direc
			},
			success : function(rtndata) {
				//console.log("return data" + rtndata);
				document.getElementById("hiddenDIV").style.visibility = "visible";
				document.getElementById("hiddenDIV").innerHTML = rtndata;
			}
		});
	}
</script>