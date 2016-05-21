<?php
class Acl
{
	private $arguments;
	private $allowed_inputs;
	public $is_forbidden;

	public function __construct($arguments)
	{
		$this->arguments = $arguments;
		$this->checkAcl();
	}

	private function checkAcl()
	{
		$allowed_inputs = array(
			'glorf',
			'flub'
		);
		$this->allowed_inputs = $allowed_inputs;

		if($this->ifIsNotAllowedInput()){
			$this->pageNotAllowed();
		}
	}

	private function ifIsNotAllowedInput()
	{
		$arguments = $this->arguments;

		if(SCRIPT && !isset($arguments[1])){
			return true;
		}

		if(isset($arguments[1])){
			return !in_array($arguments[1], $this->allowed_inputs);
		}
		return false;
	}

	private function pageNotAllowed()
	{
		echo "Access denied";
		die();
	}
}
?>