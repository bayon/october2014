<?php
 echo("<br>start");
$username = "root"; 
$password = ""; 
$hostname = "localhost"; 
$dbname   = "training";
  echo("<br>creds defined.");
// if mysqldump is on the system path you do not need to specify the full path
// simply use "mysqldump --add-drop-table ..." in this case
$dumpfname = $dbname . "_" . date("Y-m-d_H-i-s").".sql";
$command = "C:\\xampp\\mysql\\bin\\mysqldump -u root -p training";

$command_01 = "C:\\xampp\\mysql\\bin\\mysqldump --add-drop-table --host=$hostname
    --user=$username ";	
$command_02 = "C:\\xampp\\mysql\\bin\\mysqldump --help";	
if ($password) 
        $command.= "--password=". $password ." "; 
$command.= $dbname;
$command.= " > " . $dumpfname;

 echo("<br>command defined");
system($command);
  echo("<br>command sent to system");
// zip the dump file
$zipfname = $dbname . "_" . date("Y-m-d_H-i-s").".zip";
$zip = new ZipArchive();
 echo("<br>new ZipArchive instance created.");
if($zip->open($zipfname,ZIPARCHIVE::CREATE)) 
{
   $zip->addFile($dumpfname,$dumpfname);
   $zip->close();
}
  echo("<br>file added to zip archive.");
   echo("<br>file:".$zipfname);
// read zip file and send it to standard output
if (file_exists($zipfname)) {
	 echo("<br>file exists, begin reading.");
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($zipfname));
    flush();
    readfile($zipfname);
    exit;
}else{
	 echo("<br>file does not exist.");
}
?>