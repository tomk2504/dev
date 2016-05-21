<?php
class ImportFile
{
	private $folder;
	private $name;
	private $type;
	private $file_types = array(
		'glorf' => 'json',
		'flub' => 'yaml'
	);

	public function __construct($type)
	{
		$this->type = $type;
	}

	public function setFolder($folder)
	{
		$this->folder = $folder;
	}

	private function getRealFileImportPath()
	{
		$file_types = $this->file_types;

		$real_name = array_search($this->type, $file_types);
		$file_name = $this->folder.'/'.$real_name.'.'.$this->type;

		return $file_name;
	}

	public function getContent()
	{
		$file_name = $this->getRealFileImportPath();
		$content = @file_get_contents($file_name, FILE_USE_INCLUDE_PATH );
		if($content===false){
			echo "File '".$file_name."' doesn't exist"."\n";
			die();
		}

		return $content;
	}

	public function getFile()
	{
		$file = $this->getRealFile();

		return $file;
	}
}