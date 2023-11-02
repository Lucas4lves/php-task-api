<?php

class TaskException extends Exception {}

class Task
{
	private $_id;
	private $_title;
	private $_description;
	private $_deadline;
	private $_completed;


	public function __construct($id, $title, $description, $deadline, $completed)
	{
		$this->setId($id);
		$this->setTitle($title);
		$this->setDescription($description);
		$this->setDeadline($deadline);
		$this->setCompleted($completed);
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
		if((!isset($deadline)) && date_format(date_create_from_format('d/m/Y h:i:s', $deadline), 'd/m/Y h:i:s') != $deadline)
		{
			throw new TaskException("set deadline exception");
		}

		$deadline_obj = new DateTime($deadline);
		$this->_deadline = $deadline_obj->format('d/m/Y h:i:s');
	}

	public function setCompleted($completed)
	{
		if(strtoupper($completed) !== 'Y' && strtoupper($completed) !== 'N')
		{
			throw new TaskException("Set completed exception");
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
