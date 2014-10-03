<?php
//A function to use for dates with PHP & WDDX getdate() 
//SERIALIZE
$ta="<FORM><TEXTAREA rows=15 cols=80>" ;
$te="</TEXTAREA></FORM>";
$packet_id=wddx_packet_start("Date Example--");
$myDate=getdate();
wddx_add_vars($packet_id,'myDate');
$package=wddx_packet_end($packet_id);
print($ta.$package.$te);


// DESERIALIZE
$unSerialized = wddx_deserialize($package);
echo(gettype($unSerialized));
echo("<pre>");
print_r($unSerialized);
echo("</pre>");
?>