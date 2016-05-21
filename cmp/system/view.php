<?php
class View{
	
	private $template;

	function __construct($template){
		$this->template = $template;
	}
	
	public function output($name, $data=null, $return_input=false){
		if($data!=null){
			extract($data);
		}
		require 'app/view/'.$name.'.php';
		if($return_input==true){
			return $input;
		}
	}
}
?>