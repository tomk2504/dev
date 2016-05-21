<?php
require 'ImportController.php';

class ImportJsonController extends ImportController
{
	protected $type = 'json';
	protected $title = 'title';

	public function __construct()
	{
		parent::__construct();
	}

	public function readContent($data)
	{

		$import_list = array();
		$data = json_decode($data, true);
		
		foreach ($data['videos'] as $video) {

			$tags = isset($video['tags']) ? $video['tags'] : NULL;

			$video_data = array(
				'title' => $video['title'],
				'url' => $video['url'],
				'tags' => $tags
			);

			$this->video = new ImportVideo($video_data);
			$this->upload();
		}
	}
}
?>