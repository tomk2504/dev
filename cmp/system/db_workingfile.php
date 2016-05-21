<?php
class db_WorkingFile extends ActiveRecord
{
	private $db;

	public function __construct()
	{
		$this->db = ActiveRecord::getInstance();
	}

	public function insert($data)
	{
		// extract($data, EXTR_PREFIX_ALL, 'dt');

		$parent_table = 'NULL'; 
		$parent_id = '32452345'; 
		$title = $this->db->escape('title-example');  //path-hash 
		$filename = $this->db->escape('name'); 
		$url = $this->db->escape('http://...');
		$filesize = '1342342423'; 
		$filetype = 'mp4'; 
		$filesha1 = 'kljkljlj3452345'; 
		$final = '1'; 
		$creator_id = '12232523'; 
		$creation_dt = '153243144'; 
		$real_path = '/path/to/file'; 

		$query = "INSERT into working_files (parent_table, parent_id, title, filename, url, filesize, filetype, filesha1, final, creator_dt, ) VALUES('".$parent_table."', '".$parent_id."', '".$title."', '".$filename."', '".$url."', '".$filesize."', '".$filetype."', '".$filesha1."', '".$final."', '".$creator_id."', '".$creation_dt."', '".$real_path."')";

		$this->db->query($query);
	}
}
?>