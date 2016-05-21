<?php
class ImportVideo
{
	public $title;
	public $tags;
	public $url;
	public $is_empty;
	private $data;

	public function __construct($data)
	{
		$this->data = $data;
		$this->isEmptyVideo();

		if(!$this->is_empty){
			$this->url = $data['url'];
			$this->setTags();
			$this->setTitle();
		}
	}

	public function setTitle()
	{
		$data = $this->data;
		if(isset($data['title'])){
			$this->title = $data['title'];
		}
		if(isset($data['name'])){
			$this->tags = $data['name'];
		}
		return;
	}

	private function setTags()
	{
		$data = $this->data;
		if(isset($data['tags'])){
			$this->tags = $data['tags'];
		}
		if(isset($data['label'])){
			$this->tags = $data['label'];
		}
		return;
	}

	public function getData()
	{
		return $content;
	}

	protected function isEmptyVideo()
	{
		$data = $this->data;
		if(!isset($data['url'])){
			echo "Url is missing!\n";
			$this->is_empty = true;
		}
		if(!isset($data['name'])&&!isset($data['title'])){
			echo "Title is missing!\n";
			$this->is_empty = true;
		}
	}
}