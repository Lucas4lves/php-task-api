<?php

require_once('./model/Response.php');

$db_host = "server-mysql";
$db_username = "root";
$db_password = "mypassword";
$db_name = "mysql";

try {
	$connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$res = new Response();
	$res->setHttpStatusCode(200);
	$res->setSuccess(true);
	$res->addMessage("MySQL connection succesfully established");
	$res->send(); 
}
catch(PDOException $ex)
{
	$res = new Response();
	$res->setHttpStatusCode(400);
	$res->setSuccess(false);
	$res->addMessage("MySQL Connection failed with: ERROR->" . $ex->getMessage() . PHP_EOL);
	$res->send(); 
}	
