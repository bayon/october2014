<?php 
$NO_LOGIN_REQUIRED = true;
$NO_WWW = true;

require_once 'conf/server_config.php';
require_once 'ticket_api_functions.php';
$output = print_r($_REQUEST,true);
//mail('jmudd@smoothstone.com','Solar Wind Alert',$output);
unset($_REQUEST['Description']);

$output = print_r($_REQUEST,true);
$node = explode('-',$_REQUEST['Node']);
if(empty($node[0])){ die($output.'No Node Given'); }
$row = array();

$sql = "select c.cid,l.lid,d.contact,d.contactPhone,d.disasterEmail from company c left join location l on (c.cid=l.cid) left join disaster d on (d.lid=l.lid) where CONCAT(c.ccmidco,l.ccmid) = '{$node[0]}' LIMIT 1";
$query = mysql_query($sql);
$row = mysql_fetch_assoc($query);

if($row['cid'] != 5894){
  //General Growth Properties Only, exit if otherwise
  exit;
}

$output = substr($output,7);
$output = rtrim(rtrim($output),')');
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
  $args['auid'] = 446610; //Circuit Bin
  //$args['ptid'] = 91;
  $args['ptid'] = 82; //Incident
  //$args['pstid'] = 106;
  $args['pstid'] = 168; //Circuit
  $args['pstid2'] = 538; // Circuit Chronic
  //$args['cuid'] = 536804; //Network Monitoring (Dev)
  $args['cuid'] = 616658; //Network Monitoring
  //$args['priority'] = 3;
  $args['priority'] = 1;
  $args['nacid'] = 13; //Action
  $args['install_id'] = 0;
  //$args['caller_name'] = 'Joey Mudd';
  $args['caller_name'] = $row['contact'];
  //$args['caller_number'] = 5023798043;
  $args['caller_number'] = $row['contactPhone'];
  $args['tqid'] = 4; //Cust Serv
  $args['product_id'] = 32; //NetStalk
  $args['prob_desc'] = $output; //Initial ticket data text
  //$args['title'] = $_REQUEST['Node'] . ' ' . $_REQUEST['Status']; //Ticket summary property 
  $args['title'] = getTitle();
  //$args['contact_email'] = 'jmudd@smoothstone.com';
  $args['contact_email'] = $row['disasterEmail'];
  $args['multi_user'] = 1;
  
  $ticket = getExistingTicket($args);
  if(empty($ticket)){
    echo 'create';
	  //CHANGE:1  no change really just a note that this will create ALL types that have not yet been.
    createTicket($args);
	//note: createTicket($args)  need to make sure it insert "MachineType" as well.
  }
  else{
  	// NOT EMPTY
  	
  	//CHANGE:2  Add the condition ($node[1] != "fgt") to update ALL pre-existing "Cisco" types.
  	//Fortinet, Inc.
	//if($node[1] != "fgt"){
	if($_REQUEST['MachineType'] != "Fortinet, Inc."){
  		$args['cc'] = $ticket['cc'];
	    $args['custview'] = 0;
	    $args['tid'] = $ticket['tid'];
	    $args['uid'] = $args['auid'];
	    $args['update'] = $output;
	    $args['firstname'] = 'Network';
	    $args['lastname'] = 'Monitoring';
	    echo 'update';
	    updateTicket($args);
		//note: updateTicket($args)  need to make sure it insert "MachineType" as well.
  	}else{
  		//CHANGE:3 This will create a new ticket for EVERY "Fortinet" type.
  		// QUESTION: Should all fortinet requests from the same location share the SAME ticket???
  		 createTicket($args);
  	}
   
  }
  //CHANGE:4 --> 
  // FROM:: 	AND problem_description LIKE '{$_REQUEST['Node']}%'
  // TO:: 		AND problem_description LIKE '{$node[0]}%'  
  //defines search by just the prefix, not the whole string. 
  function getExistingTicket($args){
    $row = array();
	 //CHANGE:3    
    $sql = "SELECT tid,cc 
            FROM tickets 
            WHERE ticket_state_id!=1 
              AND ptid={$args['ptid']} 
              AND (pstid={$args['pstid']} OR pstid={$args['pstid2']}) 
              AND cuid={$args['cuid']}
              AND problem_description LIKE '{$node[0]}%'
            ORDER BY date_opened DESC
            LIMIT 1";
			
    echo $sql;
    $query = mysql_query($sql);
    $row = mysql_fetch_assoc($query);
    return $row;
  }
  
  function getTitle(){
    $title = "";//Ticket summary property 

    if( isset($_REQUEST['Interface']) ){
      $title = $_REQUEST['Interface'] . ' '; 
    }else{
      $title = $_REQUEST['Node'] . ' ' ; 
    }

    if (array_key_exists($_REQUEST['Errors_Today'])){
      $title .= " Errors_Today";
    }else if (array_key_exists($_REQUEST['Errors_Hour'])){
      $title .= " Errors_Hour";
    }else{
      $title .= $_REQUEST['Status'];
    }

    return $title;
  }
?>
