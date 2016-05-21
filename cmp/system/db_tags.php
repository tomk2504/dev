<?php
class db_Tags extends ActiveRecord
{
	private $db;

	public function __construct()
	{
		$this->db = ActiveRecord::getInstance();
	}

	public function insert($data)
	{
		// extract($data, EXTR_PREFIX_ALL, 'dt');
 
		$context = $this->db->escape('tagname'); 
		$query = "SELECT context FROM tag WHERE context = '".$context."'";
		$result = $this->db->query($query);

		if($this->db->hasEntry()){

			$query = "INSERT into working_files ( 'context' ) VALUES('".$context."')";

			$result = $this->db->query($query);
			return true;
		}
		return false;
	}
}
?>