<?
DEFINE ('DB_USER','root');
DEFINE ('DB_PSWD','');

$dbcon = mysql_connect('localhost',DB_USER,DB_PSWD);
if(!$dbcon){
	die('connection not established'.mysql_error());
}
	echo 'Connected successfully';
	
?>