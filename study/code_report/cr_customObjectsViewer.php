<?php 
$filename = "cr_phpObjectsList.txt";
$the_file = dirname(__FILE__) . "/" . $filename;
$lines = file($the_file);

foreach ($lines as $line_num => $line) {
	$arrayOfDefaultPHPClasses[] = trim($line);
}
?>
<!-- ================================================================
Describe PHP Object:
See get_class_methods() and get_class_vars().   HIT -->
<?php $classes = get_declared_classes();
	//file_put_contents('phpObjectsList.txt', print_r($classes, true));
	$classesUnsorted = $classes;
	asort($classes);
?>

<!-- =======================================================  Default PHP Classes fr-->

<?php $seeDefaults = false;
if ($seeDefaults) {
	/*
	echo("<div style='border:solid black 1px;'>Default PHP Classes from textfile- trimmed to Array</div><div style='height:40px;max-height:40px;overflow-y:scroll;' ><pre>");
	print_r($arrayOfDefaultPHPClasses);
	echo("<br>Classes Unsorted from get_declared_classes()");
	print_r($classesUnsorted);
	echo("<br>Difference");
	$diff = array_diff($classesUnsorted, $arrayOfDefaultPHPClasses);
	print_r($diff);
	echo("</pre></div>");
	 * 
	 */
}

$diff = array_diff($classesUnsorted, $arrayOfDefaultPHPClasses);
?>

<div>
	<div class="floater">
		Custom Classes
	</div>
	<div class="floaterR">
		Methods
	</div>
</div>
<div class="TableX_container">
	<table class="TableX" border="0" cellpadding="0" cellspacing="0" width="100%"  >
		<?php
		asort($diff);
		//sort diff after data is all accounted for
		$i = 0;
		foreach ($diff as $k => $v) {
			echo("<tr> <td>");
			echo("<div class='floater'>" . $v . " </div>");
			echo("<div class='floater'> <select style='width:90%'>");
			$methods = get_class_methods($v);
			asort($methods);
			foreach ($methods as $key => $val) {
				echo("<option>" . $val . "</option>");
			}
			echo(" </select> </div> ");
			echo("</td> </tr>");
		}
		?>
	</table>
</div>
<div style='height:200px;'>
	
</div>

