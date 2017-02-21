<?php

$servername = "198.24.129.55";
$username = "perfitfa_root";
$password = "root1234";

try {
    $conn = new PDO("mysql:host=$servername;dbname=perfitfa_webstore", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    }
catch(PDOException $e)
    {
   
    }

?>