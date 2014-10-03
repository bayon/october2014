<?php
session_start(); 

//Initialize variables not initialized without overwriting previously set variables.
if(!isset($_SESSION['home'])) {
	$_SESSION['home']="";
	$_SESSION['tempEmail']="";
}

 
if(isset($_POST['Submit'])){

//---your code---

/*
    //Error message(s) examples
    $_SESSION['home'] = "Email and Password do not match, please try again.";
    header("Location: " . $_SERVER['REQUEST_URI']);

    $_SESSION['home'] = "Email address format is invalid.  Please recheck.";
    header("Location: " . $_SERVER['REQUEST_URI']);
*/
    //success
    //unset ($_SESSION['home']); //optional, unset to clear form values.
    $GLOBAL['currentResponse']=$_POST;
	//print_r($GLOBAL['currentResponse']);
    header ("location: nextpage.php"); 
            // ---or---
    //header("Location: " . $_SERVER['REQUEST_URI']);  //re-post to same page with the $_SESSION['home'] success message.   
}
 
?>
<body>
<span><strong class="error"><?php echo $_SESSION['home'] ?></strong></span>
<form action="<?php $_SERVER['PHP_SELF']?>" name="loginform" method="post" >
    <input type="text" name="userEmail" maxlength="50" title="Enter Your email" autocomplete="off" value="<?php echo htmlspecialchars($_SESSION['tempEmail']); ?>" placeholder="enter email" required/>
    <input type="submit" name="Submit" value="Submit">
</form>

</body>