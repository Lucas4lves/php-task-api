<?php

$db_host = "server-mysql";
$db_username = "root";
$db_password = "mypassword";
$db_name = "mysql";

try {
	$connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "MySQL Connection was succeeded! Hooray!";
}
catch(PDOException $ex)
{
	echo "MySQL Connection failed with: ERROR->" . $ex->getMessage() . PHP_EOL;
}	
