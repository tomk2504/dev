<?php
class ActiveRecord extends MockDatabaseConnection
{
	private $connection;
	private $host = HOST;
	private $user = USER;
	private $password = PASSWORD;
	private $database = DB;
	public static $instance;

	private function __construct()
	{
		try {
			// no db-connection, only for test
			// $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database)
		    if ($this->connection($this->host, $this->user, $this->password, $this->database)) {
		        
		    } else {
		        throw new Exception('Unable to connect');
		    }
		} catch(Exception $e){
		    echo $e->getMessage();
		}
	}

	public static function getInstance()
	{
		if(empty(ActiveRecord::$instance)){
			$object = __CLASS__;
			ActiveRecord::$instance = new $object;
		}
		return ActiveRecord::$instance;
	}

	private function __clone()
	{
		throw new Exception("Clone of singleton is not allowed");
	}

	public function escape($query)
	{
		return $query;   //mysql_real_escape_string()
	}

	public function hasEntry()
	{

		return true;
	}
}
?>