<?php
$NO_LOGIN_REQUIRED = true;
$NO_WWW = true;

require_once 'conf/server_config.php';
require_once 'ticket_api_functions.php';
$output = print_r($_REQUEST, true);
//mail('jmudd@smoothstone.com','Solar Wind Alert',$output);
unset($_REQUEST['Description']);

$output = print_r($_REQUEST, true);
$node = explode('-', $_REQUEST['Node']);
if (empty($node[0])) { die($output . 'No Node Given');
}
$row = array();

$sql = "select c.cid,l.lid,d.contact,d.contactPhone,d.disasterEmail from company c left join location l on (c.cid=l.cid) left join disaster d on (d.lid=l.lid) where CONCAT(c.ccmidco,l.ccmid) = '{$node[0]}' LIMIT 1";
$query = mysql_query($sql);
$row = mysql_fetch_assoc($query);

if ($row['cid'] != 5894) {
	//General Growth Properties Only, exit if otherwise
	exit ;
}

$output = substr($output, 7);
$output = rtrim(rtrim($output), ')');
//$dir = '/tmp/solarwinds/';
//$h = fopen($dir.time().'.txt', 'w');
//     fwrite($h, $output);
//     fclose($h);

//mail('jmudd@smoothstone.com','Solar Wind Alert',$output);
//die();
$args = array();
//$args['cid'] = 11324;
$args['cid'] = $row['cid'];
//$args['lid'] = 86116;
$args['lid'] = $row['lid'];
//$args['auid'] = 186710;
$args['auid'] = 446610;
//Circuit Bin
//$args['ptid'] = 91;
$args['ptid'] = 82;
//Incident
//$args['pstid'] = 106;
$args['pstid'] = 168;
//Circuit
$args['pstid2'] = 538;
// Circuit Chronic
//$args['cuid'] = 536804; //Network Monitoring (Dev)
$args['cuid'] = 616658;
//Network Monitoring
//$args['priority'] = 3;
$args['priority'] = 1;
$args['nacid'] = 13;
//Action
$args['install_id'] = 0;
//$args['caller_name'] = 'Joey Mudd';
$args['caller_name'] = $row['contact'];
//$args['caller_number'] = 5023798043;
$args['caller_number'] = $row['contactPhone'];
$args['tqid'] = 4;
//Cust Serv
$args['product_id'] = 32;
//NetStalk
$args['prob_desc'] = $output;
//Initial ticket data text
//$args['title'] = $_REQUEST['Node'] . ' ' . $_REQUEST['Status']; //Ticket summary property
//NOTE: Add $node as a parameter to getTitle()
$args['title'] = getTitle($node);
//$args['contact_email'] = 'jmudd@smoothstone.com';
$args['contact_email'] = $row['disasterEmail'];
$args['multi_user'] = 1;
//Note: 5) I have to send the $_REQUEST variable as a parameter, as it would be outside the scope of the function otherwise.
// SWAP:
// i)  $ticket = getExistingTicket($args);
// ii) $ticket = getExistingTicket($args,$_REQUEST['MachineType']);
$ticket = getExistingTicket($args, $node);
if (empty($ticket)) {
	// NOTE: 1) This handles all types of NEW auto creation tickets without matches.
	echo 'create';
	createTicket($args);
} else {

	$args['cc'] = $ticket['cc'];
	$args['custview'] = 0;
	$args['tid'] = $ticket['tid'];
	$args['uid'] = $args['auid'];
	$args['update'] = $output;
	$args['firstname'] = 'Network';
	$args['lastname'] = 'Monitoring';
	echo 'update';
	//NOTE: 4) updateTicket() should, by default, attach the incoming ticket to the latest similar ticket.
	updateTicket($args);
}
//NOTE: 2) Swap these two clauses in the following $sql command.
// i)  AND problem_description LIKE '{$_REQUEST['Node']}%'
// ii)  AND problem_description LIKE '{$node[0]}%'
// This checks for existing tickets with the same prefix, instead of the entire string.

//NOTE: 3) Now I have to sort by $_REQUEST['MachineType'] , which should be "Fortinet" OR "Cisco".

//NOTE: 6 Swap:
// i) function getExistingTicket($args) {
// ii) function getExistingTicket($args,$machineType) {
function getExistingTicket($args, $node) {
	$row = array();

	if ($_REQUEST['MachineType'] == "Fortinet") {
		$sql = "SELECT tid,cc 
            FROM tickets 
            WHERE ticket_state_id!=1 
              AND ptid={$args['ptid']} 
              AND (pstid={$args['pstid']} OR pstid={$args['pstid2']}) 
              AND cuid={$args['cuid']}
              AND problem_description LIKE '%" . $node[0] . "%'
              AND problem_description LIKE '%Fortinet%'
            ORDER BY date_opened DESC
            LIMIT 1";
	} else {
		//Machine type is Cisco, or (other than fortinet).
		$sql = "SELECT tid,cc 
            FROM tickets 
            WHERE ticket_state_id!=1 
              AND ptid={$args['ptid']} 
              AND (pstid={$args['pstid']} OR pstid={$args['pstid2']}) 
              AND cuid={$args['cuid']}
              AND problem_description LIKE '%" . $node[0] . "%'
              AND problem_description NOT LIKE '%Fortinet%'
            ORDER BY date_opened DESC
            LIMIT 1";
	}

	echo $sql;

	$query = mysql_query($sql);
	$row = mysql_fetch_assoc($query);
	return $row;
}

//NOTE: Add $node as parameter
function getTitle($node) {
	$title = "";
	//Ticket summary property

	if (isset($_REQUEST['Interface'])) {
		$title = $_REQUEST['Interface'] . ' ';
	} else {
		//$title = $_REQUEST['Node'] . ' ';
		//NOTE:  
		$machineTypeLC = strtolower($_REQUEST['MachineType']);
		//Check if MachineType variable contains "fortinet".
		if (strpos($machineTypeLC, 'fortinet') !== false) {
			$title = $_REQUEST['Node'] . " Fortinet Network Monitoring";
		}else {
			$title = $node[0] . " Standard Network Monitoring";
		}
	}

	if (array_key_exists($_REQUEST['Errors_Today'])) {
		$title .= " Errors_Today";
	} else if (array_key_exists($_REQUEST['Errors_Hour'])) {
		$title .= " Errors_Hour";
	} else {
		$title .= $_REQUEST['Status'];
	}

	return $title;
}
?>
