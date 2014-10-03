<html>
	<?php 
	include_once('table_constants.php');
	?>
	<script type='text/javascript' src='../latest_jquery.js'></script>
	<body onload="getagentZ()">

		<?php
		/*
		 * First, let's look at the code behind the grid itself.
		 * The grid is actually a straightforward HTML table
		 * (well, two tables actually, one for the header and one for the body),
		 * with the header made up of the usual <th> tags, and the body wrapped inside a <div>:
		 */
	?>

<table cellspacing="0" cellpadding="0"  width=100%  border=1>
	<tr>
		<th  class="col1_width">
		<img id="up1" src="up.gif" onClick = "getagents('ContactID','');clearimgs();setupimg('up1');">
		Contact ID
		<img id="down1" src="down.gif" onClick = "getagents('ContactID','desc');clearimgs();setdownimg('down1');">
		</th>
		
		<th  class="col1_width">
		<img id="up2" src="up.gif" onClick = "getagents('ContactFullName','');clearimgs();setupimg('up2');">
		Contact Name
		<img id="down2" src="down.gif" onClick = "getagents('ContactFullName','desc');clearimgs();setdownimg('down2');">
		</th>
		
		<th  class="col1_width">
		<img id="up3" src="up.gif" onClick = "getagents('ContactSalutation','');clearimgs();setupimg('up3');">
		Salut
		<img id="down3" src="down.gif" onClick = "getagents('ContactSalutation','desc');clearimgs();setdownimg('down3');">
		</th>
		
		<th class="col1_width" >
		<img id="up4" src="up.gif" onClick = "getagents('ContactTel','');clearimgs();setupimg('up4');">
		Telephone
		<img id="down4" src="down.gif" onClick = "getagents('ContactTel','desc');clearimgs();setdownimg('down4');">
		</th>
		
	</tr>
</table>
<div id="hiddenDIV" style="visibility:hidden; background-color:white;
border: 0px solid black;"></div>

<?php
/*
 * Each header contains, as well as the header title, two images (an 'up' and a 'down' arrow).
 * Each of these images has two possible source files, depending whether it is 'illuminated' or not.

 Clicking on any of these arrows first calls the getagents() function,
 * passing to it the name of the database field associated with that column,
 * and an argument to indicate whether to sort the data upwards or downwards in that column.
 * Here's the code for the getagents() function:
 */
?>
		<script>
		/*
			// GET AGENTS
			var url = "getagents.php?param=";
			// The server-side scripts
			function getagents(column, direc) {
				alert('get agents: url:'+ url );
				var myRandom = parseInt(Math.random() * 99999999);
				// cache buster
				 http.open("GET", url + escape(column) + "&dir=" + direc + "&rand=" + myRandom, true);
				 
				http.onreadystatechange = handleHttpResponse();
				http.send(null);
			}*/
		</script>
		
		<?php
		/*
		 * The code to instantiate an XMLHTTPRequest is well covered elsewhere on this site,
		 * so we'll not do so again here; suffice to say that http is our already-existing XMLHTTPRequest object.

		 Here we append to the URL of the server routine parameters indicating the column and direction of
		 * our sort request. These are passed to the server routine getagents.php as variables.

		 The variable myRandom contains a random number which is also appended to the URL as a parameter,
		 * and helps us to ensure we receive fresh server data rather than data from our browser's cache.
		 * This technique is described elsewhere on the site in the article on Cache Busting with Javascript.

		 We define the javascript routine which will handle the server's response as handleHttpResponse,
		 * but before we look at that' let's see what happens at the server by examining the code
		 * for getagents.php:
		 */
	?>
<script>
	/*Some helper functions - setupimg(), setdownimg() and clearimgs() are used to redraw the up and down
	 arrows appropriately, with the correct arrow 'illuminated'. The code for these functions:
	 *
	 */

	function clearimgs() {
		alert('clearimgs');
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
		alert('setupimg');
		/*
		document.getElementById(thisid).src = "up1.gif";
		*/
	}

	function setdownimg(thisid) {
		alert('setdownimg');
		/*
		document.getElementById(thisid).src = "down1.gif";
		*/
	}
</script>
<?php
/*
 * An extra call to the getagents() function is also made in the body's onLoad() event handler,
 * to correctly set up the table when the page is initially loaded.

 This grid could easily be extended to offer paging (i.e. 'Previous' and 'Next' buttons)
 * to allow a user to navigate large data sets without ever having to wait for a page refresh.
 */
?>
	</body>
</html>
<script>
	console.log("javascript is working is this is in the console");
	$(document).ready(function() {
		console.log('jq is on...');

		jQuery.ajax({
			url : "getagents.php",
			type : "GET",
			data : {
				"column" : "ContactID",
				"direc" : "desc"
			},
			success : function(rtndata) {
				console.log("return data" + rtndata);
				//handleHttpResponse();
				//$("#ajax_response").html("<pre>" + rtndata + "</pre>");
				//var json = rtndata;
				document.getElementById("hiddenDIV").style.visibility = "visible";
				document.getElementById("hiddenDIV").innerHTML = rtndata;

			}
		});
	});
	// GET AGENTS
	//var url = "getagents.php?param=";
	// The server-side scripts
	function getagents(column, direc) {
		/*
		alert('get agents: url:' + url);
		var myRandom = parseInt(Math.random() * 99999999);
		// cache buster
		http.open("GET", url + escape(column) + "&dir=" + direc + "&rand=" + myRandom, true);

		http.onreadystatechange = handleHttpResponse();
		http.send(null);
		*/
		jQuery.ajax({
			url : "getagents.php",
			type : "GET",
			data : {
				"column" : column,
				"direc" : direc
			},
			success : function(rtndata) {
				console.log("return data" + rtndata);
				
				document.getElementById("hiddenDIV").style.visibility = "visible";
				document.getElementById("hiddenDIV").innerHTML = rtndata;

			}
		});
		
		
	}
</script>