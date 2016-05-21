<?php
require 'basecontroller.php';

class MainController extends BaseController
{
	private $type;

	public function __construct()
	{
		parent::__construct();
		$this->view = new View('main');
	}

	public function index($type)
	{
		$this->type = $type;
		$this->display(array('type' => $type));
	}

	public function display($data)
	{		
		$return_input = true;
		
		$input = $this->view->output('main', $data, $return_input);
		$this->redirect($input, 'prepare_file', $this->type);
	}
}
?>