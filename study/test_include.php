<?php

 function fix_string($a)
    {
        echo "Called @ ".
            xdebug_call_file().
            ":".
            xdebug_call_line().
            " from ".
            xdebug_call_function();
    }

    $ret = fix_string(array('Bayon'));
	
	$string = "foo stringzzzaaaaaa";
	$a = array(1, 2, 3);
    $b =& $a;
    $c =& $a[2];

    xdebug_debug_zval('a');
    xdebug_debug_zval("a[2]");
	$bool = xdebug_break();
	echo("<br>BOOL BREAK:".$bool."</br>");
	xdebug_debug_zval("string");
	
?>