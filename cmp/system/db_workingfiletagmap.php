<?php
class db_WorkingFileTagMap extends ActiveRecord
{
	private $db;

	public function __construct()
	{
		$this->db = ActiveRecord::getInstance();
	}

	public function insert($data)
	{
		// extract($data, EXTR_PREFIX_ALL, 'dt');

		$tag_id = '2435234'; 
		$working_file_id = '3456345';   

		$query = "INSERT into workingfiletagmap (tag_id, working_file_id) VALUES('".$tag_id."', '".$working_file_id."')";

		$this->db->query($query);
	}
}
?>