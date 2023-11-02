<?php

class Db 
{
	private PDO $writeDbConnection;
	private PDO $readDbConnection;
	
	private string $db_host = "server-mysql";
	private string $db_username = "root";
	private string $db_password = "mypassword";
	private string $db_name = "mysql";

	public function connect()
	{
		try{
			if(!isset($this->writeDbConnection))
			{
				$this->writeDbConnection = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_username, $this->db_password);
				$this->writeDbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
				$res = new Response();
				$res->setHttpStatusCode(200);
				$res->setSuccess(true);
				$res->addMessage("MySQL connection succesfully established");
				$res->send(); 

		}catch(Exception $ex)
		{
				$res = new Response();
				$res->setHttpStatusCode(500);
				$res->setSuccess(false);
				$res->addMessage("MySQL connection failed with such ERROR " . $ex->getMessage() . PHP_EOL);
				$res->send(); 
		}
	}
}
