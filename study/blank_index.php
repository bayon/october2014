<?php echo(__FILE__); ?>
<br>
http://devzone.zend.com/1139/profiling-php-applications-with-xdebug/

<br>
WinCacheGrind
<br>
??:: http://localhost/study/blank_index.php?XDEBUG_SESSION_START=blank_index

<?php
xdebug_start_trace('c:/xdebug/data/trace_101.xt');
 
/* * 
 var_dump(xdebug_code_coverage_started());

    xdebug_start_code_coverage();

    var_dump(xdebug_code_coverage_started());
*/
$variable = "This is a string var";
$bool = xdebug_break();
echo("<br>Break BOOL:".$bool."</br>");
//XDEBUG_SESSION_START=$_SESSION[];
class TestClass{
	public $name;
	public function __construct($name='Regular Test Class'){
		//see if xdebug registers this.
		$this->name = $name;
	}
	public function spendTime($time){
		for($i=0;$i<$time;$i++){
		
			$x = $i*$i;
		}
		echo("<br>".$this->name);
	}
}
function testFunction(){
	for($i=0;$i<1000000;$i++){
		
		$x = $i*$i;
	}
}
testFunction();
include_once('test_include.php');
$testClass = new TestClass("fooTest");
$testClass->spendTime(100000);


xdebug_stop_trace();

//include_once('code_report/code_report.php'); 
/*
 * 
 * 
 * 
 * print fac(7);
function fac($x) {
	if (0 == $x)
	 
		return 1;
	echo "<br>x:".$x."</br>";
	return $x * fac($x - 1);
}
 * 
 */


?>

<?php 
//You can also check this script if the xdebug is listen to port 9000:
/*
     $address = '127.0.0.1'; 
     $port = 9000; 
     $sock = socket_create(AF_INET, SOCK_STREAM, 0); 
     socket_bind($sock, $address, $port) or die('Unable to bind'); 
     socket_listen($sock); 
     $client = socket_accept($sock); 
     echo "connection established: $client"; 
     socket_close($client); 
     socket_close($sock); 
 * 
 */
?>