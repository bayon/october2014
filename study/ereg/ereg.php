<?php
//For example, the following code snippet prints "This was a test" three times:
$string = "This is a test";
echo str_replace(" is", " was", $string);
echo ereg_replace("( )is", "\\1was", $string);
echo ereg_replace("(( )is)", "\\2was", $string);

?>

<?php
/* This will not work as expected. 
 * One thing to take note of is that if you use an integer value as the replacement parameter,
 *  you may not get the results you expect.
 *  This is because ereg_replace() will interpret the number as the ordinal value 
 * of a character, and apply that. For instance:
 *
$num = 4;
$string = "This string has four words.";
$string = ereg_replace('four', $num, $string);
echo $string;   /* Output: 'This string has   words.'  

// This will work. 
$num = '4';
$string = "This string has four words.";
$string = ereg_replace('four', $num, $string);
echo $string;   // Output: 'This string has 4 words.' 
 */
 // This will work. 
$num = '4';
$string = "This string has four words.";
$string = ereg_replace('four', $num, $string);
echo $string;   // Output: 'This string has 4 words.' 
 
?>

<?php
//.Example #3 Replace URLs with links
$url = "https://www.forteworks.com";
$link = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]",
                     '<a href="\\0">\\0</a>', $url);
echo($link);
					  
?>
