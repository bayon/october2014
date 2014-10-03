<html>
	<style>
		.bar {
			float: left;
			width: 25%;
			border: solid black 1px;
			padding: 5px;
			font-size: 12px;
		}
		.accent {
			font-weight: bold;
		}
	</style>

	<body>
		<?php
		// display errors
		ini_set('display_errors', 1);

		$stringNode1 = "422GEN102-swi-IDF1-PERIM.westipc.com";
		$stringNode2 = "422GEN102-fgt-100D.westipc.com";
		$stringNode3 = "9993MACK2228-ziggzag-400t5.AcmeInc.com";
		$arrayOfPossibilities = array($stringNode1, $stringNode2, $stringNode3);
		$assocMatrix = array( array("string" => $stringNode1, "abbreviation" => "GEN"), array("string" => $stringNode2, "abbreviation" => "GEN"), array("string" => $stringNode3, "abbreviation" => "MACK"));
		
		foreach ($assocMatrix as $assocArray) {
			analyzeStringAndAbbreviation($assocArray);
		}

		function analyzeStringAndAbbreviation($assocArray) {
			$string = $assocArray['string'];
			$abbrev = $assocArray['abbreviation'];
			$explodedString = explode("-", $string);
			$HTML = "<span class='accent'>String:</span><hr>";
			$HTML .= $string . "<hr>";
			$HTML .= "<span class='accent'>Exploded String:</span><hr>";
			$prefix = $explodedString[0];
			$exceptionSegment = $explodedString[1];
			$HTML .= "prefix:  " . $prefix;
			$HTML .= "<br>exception:  " . $exceptionSegment;
			switch ($exceptionSegment) {
				case 'fgt' :
					$HTML .= "<span style='color:red;'> - Fortinet - </span>";
					break;

				default :
					//echo("<script>alert('Standard Case');</script>");
					break;
			}
			$HTML .= "<hr><span class='accent'>Dissect Prefix:</span><hr>";
			$explodedPrefix = explode($abbrev, $prefix);
			$companyCode = $explodedPrefix[0];
			$locationCode = $explodedPrefix[1];
			//string substr ( string $string , int $start [, int $length ] )
			$companyAbbreviation = substr($prefix, strlen($companyCode), strlen($abbrev));
			$HTML .= "company code:  " . $companyCode;
			$HTML .= "<br>company abbreviation:  " . $companyAbbreviation;
			$HTML .= "<br>location code:  " . $locationCode;
			echo("<div class='bar' >" . $HTML . "</div>");
		}
 
		 
		?>
	</body>
</html>