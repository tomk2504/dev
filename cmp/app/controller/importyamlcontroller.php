<?php
require 'ImportController.php';

class ImportYamlController extends ImportController
{
	protected $type = 'yaml';
	protected $title = 'label';

	public function __construct()
	{
		parent::__construct();
	}

	public function readContent($data)
	{
		$data = Spyc::YAMLLoad($data);
		foreach($data as $video){

			$tags = isset($video['labels']) ? $video['labels'] : NULL;
			$tags = explode(', ', $tags);

			$video_data = array(
				'title' => $video['name'],
				'url' => $video['url'],
				'tags' => $tags
			);
			
			$this->video = new ImportVideo($video_data);
			$this->upload();
		}
	}
}
?>