self.addEventListener('message', function (e) {
    //Data Posting from page is accepting here
    var data = e.data;
 //ADD YOUR SERVICE URL HERE     
 var ServiceUrl = "test_controller.php?eMailId=" + data.email;
 console.log(ServiceUrl);
    GetData();
    function GetData() {
        debugger;
        try {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', ServiceUrl, false);
            xhr.setRequestHeader("Content-Type",
            "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                    //Posting Back the Result
                        postMessage(xhr.responseText);
                    }
                }
            };
            xhr.send(null);
        } catch (e) {
            postMessage(null);
        }
    }
}, false);