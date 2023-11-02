<?php

class TaskException extends Exception {}

class Task
{
	private $_id;
	private $_title;
	private $_description;
	private $_deadline;
	private $_completed;

	/*
	 *@param id Primary key for a task. Autoincremented by DB
	 *@param title A title for a task. Mandatory 
	 *@param description 
	 *@param deadline 
	 *@param completed 
	 * */


	public function __construct($id, $title, $description, $deadline, $completed = false)
	{
		$this->setId($id);
		$this->setTitle($title);
		$this->setDescription($description);
		$this->setDeadline($deadline);
		$this->setCompleted($completed);
	}


	public function validateDeadline(string $deadline, string $mask) : bool
	{
		$deadline_obj = new DateTime($deadline);
		if($deadline_obj->format($mask) != date_create_from_format($mask, $deadline)){
			return false;
		}
		return true;
	}

	private function setId($value)
	{
		if(!is_numeric($value) || $value <= 0)
		{
			throw new TaskException("Task Id must be of type number and greater than zero");
		}

		$this->_id = $value;
	}	

	public function setTitle($title)
	{
		if(!is_string($title) || strlen($title) > 255)
		{
			throw new TaskException("Task Title must be of type string and minor than 255 characters");
		}

		$this->_title = $title;
	}

	public function setDescription($description)
	{
		if(!is_string($description) || strlen($description) > 1000)
		{
			throw new TaskException("Description must ne of type string and have less than 1k chars");
		}

		$this->_description = $description;
	}

	public function setDeadline($deadline)
	{
		if((!isset($deadline)) && !$this->validateDeadline($deadline, 'm/d/Y h:i:s'))
		{
			throw new TaskException("set deadline exception");
		}

		$deadline_obj = new DateTime($deadline);
		$this->_deadline = $deadline_obj->format('m/d/Y h:i:s');
	}

	public function setCompleted($completed)
	{
		if(!isset($completed) || !is_bool($completed)){
			throw new TaskException("Complete must be of boolean type");
		}
		$this->_completed = $completed;
	}

	public function toJson()
	{
		$task = array();
		$task['id'] = $this->_id;
		$task['title'] = $this->_title;
		$task['description'] = $this->_description;
		$task['deadline'] = $this->_deadline;
		$task['completed'] = $this->_completed;

		return json_encode($task);
	}

}
