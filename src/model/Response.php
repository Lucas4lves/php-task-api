<?php

class ResponseException extends Exception{}

class Response
{
	private $_success;
	private $_httpStatusCode;
	private $_messages = array();
	private $_responseData = array();
	private $_data = array();


	public function setHttpStatusCode($code)
	{
		if(!is_numeric($code) || is_null($code))
		{
			throw new Exception("Invalid code format. Code must be of type number");
		}

		$this->_httpStatusCode = $code;
	}	

	public function setSuccess($value)
	{
		if(!is_bool($value) || is_null($value))
		{
			throw new Exception("Success must be of type boolean");
		}

		$this->_success = $value;
	}

	public function addMessage($message)
	{
		if(!is_string($message) || strlen($message) > 255)
		{
			throw new ResponseException("Message Error");
		}

		$this->_messages[] = $message;
	}

	public function send(){
		header('Content-type: application/json;charset=utf-8');
		if(($this->_success !== false && $this->_success !== true) || !is_numeric($this->_httpStatusCode))
		{
			http_response_code(500);
			$this->_responseData['statusCode'] = 500;
			$this->_responseData["success"] = false;
			$this->addMessage("This is an added message");
			$this->_responseData['messages'] = $this->_messages;
		} else{
			http_response_code(200);
			$this->_responseData['statusCode'] = $this->_httpStatusCode;
			$this->_responseData["success"] = $this->_success;
			$this->_responseData["messages"] = $this->_messages;
			$this->_responseData['data'] = $this->_data;
		}

		echo json_encode($this->_responseData) . PHP_EOL;
	}
}
