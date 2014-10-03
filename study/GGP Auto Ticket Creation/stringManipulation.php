<html>
	<style>
		.bar {
			float: left;
			width: 25%;
			border: solid black 1px;
			padding: 5px;
			font-size:12px;
		}
		.accent{
			font-weight:bold;
		}
	</style>

	<body>

		<?php
		// display errors
		ini_set('display_errors', 0);
		
		$stringNode1 = "422GEN102-swi-IDF1-PERIM.westipc.com";
		$stringNode2 = "422GEN102-fgt-100D.westipc.com";
		$stringNode3 = "9993MACK2228-ziggzag-400t5.AcmeInc.com";

		$arrayOfPossibilities = array($stringNode1, $stringNode2, $stringNode3);

		foreach ($arrayOfPossibilities as $p) {

			$explodedString = explode("-", $p);
			$HTML = "<span class='accent'>String:</span><hr>";

			$HTML .=   $p."<hr>";
			$HTML .= "<span class='accent'>Exploded String:</span><hr>";
			//echo("<pre>"); print_r($explodedString); echo("</pre>");

			$prefix = $explodedString[0];
			$exceptionSegment = $explodedString[1];
			$HTML .= "prefix:  " . $prefix;
			$HTML .= "<br>exception:  " . $exceptionSegment;
			switch ($exceptionSegment) {
				case 'fgt' :
					//$HTML .="<script>alert('Fortinet Exception');</script>";
					$HTML .= "<span style='color:red;'> - Fortinet - </span>";
					break;

				default :
					//echo("<script>alert('Standard Case');</script>");
					break;
			}
			$HTML .= "<hr><span class='accent'>Dissect Prefix:</span><hr>";
			$currentAbbreviation = "GEN";

			$explodedPrefix = explode($currentAbbreviation, $prefix);
			//echo("<pre>"); print_r($explodedPrefix); echo("</pre>");
			$companyCode = $explodedPrefix[0];
			$locationCode = $explodedPrefix[1];

			$companyAbbreviation = substr($prefix, 3, 3);
			$HTML .= "company code:  " . $companyCode;
			$HTML .= "<br>company abbreviation:  " . $companyAbbreviation;
			$HTML .= "<br>location code:  " . $locationCode;
			echo("<div class='bar' >" . $HTML . "</div>");

			/*
			 echo("<br>Questions :<hr></br>");

			 echo("<ul>
			 <li>Will the prefix have a set format like ###ABC### ?</li>
			 <li>Will the exception segment always be next in string after prefix?</li>
			 </ul> ");
			 * */

		}

		function searchForExceptionAbbreviation($explodedString) {
			/*Purpose:
			 * If exception key "fgt" can appear ANYWHERE in the given string,
			 * to search for exception abbreviation ANYWHERE in the given exploded string
			 * */
			foreach ($explodedString as $v) {
				echo("<br>" . $v);
				switch ($v) {
					case 'fgt' :
						echo("<script>alert('Fortinet Exception');</script>");
						break;

					default :
						echo("<script>alert('Standard Case');</script>");
						break;
				}
			}
		}

		// If exception key "fgt" can appear ANYWHERE in the given string...
		//-----searchForExceptionAbbreviation($explodedString);
		
	?>
	</body>
</html>