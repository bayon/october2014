
<style>
	.TableX_container {
		width: 100%;
		height: 100px;
		max-height: 100px;
		overflow-y: scroll;
		border: solid 1px #cccccc;
		background-color: #ffffff;
		float: left;
	}
	.TableX {
		font-family: arial;
		text-align: left;
		background-color: #ffffff;
	}
	.TableX tr {
		height: 25px;
	}
	.TableX thead {
		background-color: #0ff000;
	}
	.TableX thead th {
		padding-left: 10px;
	}
	.TableX tbody {
		height: 100px;
		overflow: hidden;
		overflow-y: auto;
		max-height: 100px;
	}
	.TableX  tr:hover {
		background-color: #eeeeee;
	}
	.TableX  td {
		padding-left: 5px;
		border-bottom: solid 1px #cccccc;
		color: black;
	}
	.TableX tfoot {
		background-color: #0ff000;
	}
	.TableX tfoot td {
		text-align: center;
		padding-left: 10px;
	}
	.floater {
		float: left;
		width: 45%;
	}
	.floaterR {
		float: right;
		width: 45%;
	}
	.scroller {
		width: 100%;
		overflow-y: scroll;
		height: 40px;
	}
	.scrollee {
		float: left;
		width: 100%;
	}
</style>
<?php

echo("<br><div style='float:left;color:white;font-size:45px;'>".__FILE__."</div>");
$lines = file('phpObjectsList.txt');


foreach ($lines as $line_num => $line) {
	$arrayOfDefaultPHPClasses[] = trim($line);
	//echo("<br>HIT");
}

 
?>
<!-- ================================================================
Describe PHP Object:
See get_class_methods() and get_class_vars(). -->
<?php $classes = get_declared_classes();
	//file_put_contents('phpObjectsList.txt', print_r($classes, true));
	$classesUnsorted = $classes;
	asort($classes);
?>

<!-- =======================================================  -->

<?php
echo("<div>Default PHP Classes from textfile- trimmed to Array</div><div style='height:100px;overflow-y:scroll;' ><pre>");
echo("<br>Default PHP Classes from textfile- trimmed to Array");
print_r($arrayOfDefaultPHPClasses);
echo("<br>Classes Unsorted from get_declared_classes()");
print_r($classesUnsorted);
echo("<br>Difference");
$diff = array_diff($classesUnsorted,$arrayOfDefaultPHPClasses);
print_r($diff);
echo("</pre></div>");
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
	<table class="TableX" border="0" cellpadding="0" cellspacing="0" width="98%"  >
		<?php
asort($diff); //sort diff after data is all accounted for
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

 
 
