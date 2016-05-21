<?php
class Router
{
	private $name = 'main';
	private $input_count;
	private $route;
	private $type = 'json';
	private $filepath = 'feed-exports';
	private $arguments;

	function __construct($arguments)
	{
		$this->arguments = $arguments;
		$this->name = $this->getName();
		$this->filepath = $this->getFilePath();
		$this->type = $this->getType();
	}	

	function getRoute()
	{		
		$route = $this->setRoute();
		$route = $route[$this->name];

		return $route;
	}

	function setRoute()
	{
		$import_type = ucfirst(strtolower($this->type));

		$route = array(
			'main' => array(
				'controller' => 'Import'.$import_type,
				'action' => 'getContent',
				'parameter' => $this->filepath
			),
			'upload_file' => array(
				'controller' => 'Import'.$import_type,
				'action' => 'readFile',
				'parameter' => $this->filepath
			),
		);

		return $route;
	}

	private function getType()
	{
		$provider = $this->getProvider();

		$types = array(
			'glorf' => 'json',
			'flub' => 'yaml'
		);
		$type = $types[$provider];
		
		return $type;
	}

	private function getFilePath()
	{
		if(!SCRIPT){
			return $_GET['filepath'];
		}
		
		return isset($this->arguments[2]) ? $this->arguments[2] : $this->filepath;
	}

	private function getName()
	{
		if(!SCRIPT){
			return $_GET['name'];
		}
		
		return $this->name;
	}

	private function getProvider()
	{
		if(SCRIPT){
			return $this->arguments[1];
		}
		return $_GET['provider'];
	}
}
?>