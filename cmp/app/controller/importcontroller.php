<?php
require 'basecontroller.php';
require '/../model/importer.php';

abstract class ImportController extends BaseController
{
	protected $type;
	protected $file;
	private $file_name = 'glorf.json';
	protected $title;
	protected $folder;
	private $file_content;
	protected $video;

	abstract public function readContent($content);

	public function __construct()
	{
		$this->file = new ImportFile($this->type);
		$this->view = new View('importer');
	}

	public function getContent($filepath)
	{
		$file = $this->file;
		$file->setFolder($filepath);
		$content = $file->getContent();
		$file_list = $this->readContent($content);	

		$this->upload($file_list);
	}

	public function upload()
	{	
		$video = $this->video;
		$tmp_name = 'uploaded_videos/'.uniqid();
		$result = $this->loadFile($tmp_name);

		if($result){
			$this->saveFile($video);
			$this->display($video);
		}
	}

	public function loadFile($tmp_name)
	{
		$video = $this->video;
		$url = $video->url;

		$content = "\n\nUPLOADING-STRING:*** @file_put_contents('".$tmp_name."', fopen('".$url."', 'r'), FILE_USE_INCLUDE_PATH); ***\n\n";
		echo $content."\n";
		if($content===false){
			echo "Url '".$url."' doesn't exist!\n\n";
			return false;
		}
		echo "Url '".$url."' uploaded!\n\n";
		return true;
	}

	private function saveFile($file)
	{
		try{
			$importer = new Importer();
			$result = $importer->save($file);
		}catch(Exception $e){
			echo $e->getMessage();
			die();
		}
	}

	private function display($data)
	{
		$title = $data->title;
		$url = $data->url;
		$tags = $data->tags;

		$tags = implode(', ', $tags);

		$import_list_result = "importing: ".$title."; Url: ".$url."; Tags: ".$tags;
		$data = array(
			'file' => $import_list_result,
		);

		$this->view->output('importer', $data);
		return;
	}
}
?>