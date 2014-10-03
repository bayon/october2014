self.addEventListener("message", function(e) {
	// one parameter ‘e’ which has a data property. 
	//This data property can be just simple text or JSON.
	
	
	self.postMessage("Saved person: " + e.data);
	var custom = e.data + "custom";
	self.postMessage("Saved person: " + custom);
});
