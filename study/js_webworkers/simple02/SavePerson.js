self.addEventListener("message", function(e) {
	// one parameter ‘e’ which has a data property. 
	//This data property can be just simple text or JSON.
	
	 
	//self.postMessage("Saved person: " + e.data);
	self.postMessage("Saved person: " + e.data['dataString']);
	var datastring = e.data['dataString'];
	var controller = e.data['controller'];
	var receiverId = e.data['receiverId'];
	
	//var custom =  e.data['dataString'] + jack();
	var custom = datastring +"-"+ controller + "-"+receiverId;
	self.postMessage("Saved person: " + custom);
	//setTimeout(function(){self.postMessage("Saved person: " + custom);}, 5000);
	var response = postAjaxForm(datastring,controller,receiverId);
	sleep(5000);
	self.postMessage(response);
	 
});
function jack(){
	return "jack";
}
function postAjaxForm(dataString,controller,receiverId) {
	var xmlhttp;
	/*
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	*/
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			//document.getElementById(receiverId).innerHTML = xmlhttp.responseText;
			return xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST", controller, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(dataString);
	 
	//use case: postAjaxForm('controller=Henry&method=Ford', './views/page1.php', 'menu1');
}
