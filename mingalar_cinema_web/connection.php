<?php
    $host = "localhost";
    $rootname = "root";
    $password ="";
    $database = "shaesaung";
    // create connection
	
	$connection = new mysqli($host, $rootname, $password, $database);
	
if ($connection->connect_errno) {
    echo "Failed to connect to MySQL: (" . $connection->connect_error . ") " . $connection->connect_error;
	}

$connection->select_db($database);
	
?>