<?php
DEFINE ('DB_USER','root');
DEFINE ('DB_PSWD','');
DEFINE ('DB_NAME','perfitdb');
$dbcon = new mysqli('localhost',DB_USER,DB_PSWD,DB_NAME);

if(!$dbcon){
	echo "connection error";
	die('connection not established'.mysqli_error());
	
}
	
	
?>