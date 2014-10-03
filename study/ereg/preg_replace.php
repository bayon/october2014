<html>
	<body>
		
	
 
<hr>
<?php
$string = "SELECT someSQLmess ORDER BY someKeyField  ORDER BY 2 order by 3 order by 4";

$stringWithoutOrderBy = "SELECT someSQLmess  asdf asdf asdf asdf ";
?>
<hr>
<?php
$sampleString = $string;
preg_match('#(.*)ORDER BY#si',$sampleString,$matches);
echo("<pre>");print_r($matches);echo("</pre>");
echo("<hr>");
if(count($matches) > 0 ){
	echo($matches[1]." FINAL ORDER BY CLAUSE");
}else{
	echo($sampleString);
}
?>
</body>
</html>