<?php
class FrontController implements iFrontController
{
	private $input;
	private $router;
	private $route;
	private $controller;
	private $parameter = NULL;
	private $action = 'index';
	private $default = 'main';

	public function __construct($arguments=Null)
	{
		$acl = new Acl($arguments);

		$router = new Router($arguments);
		$this->router = $router;
		$this->setRoute();
		$this->setControllerData();
	}

	private function setRoute()
	{
		$route = $this->router->getRoute();
		$this->route = $route;
	}

	private function setControllerData()
	{	
		$controller = $this->route['controller'];
		require 'app/controller/'.strtolower($controller).'controller.php';
		$this->action = $this->route['action'];
		$this->parameter = $this->route['parameter'];
		$this->controller = $controller.'Controller';
	}

	public function start()
	{
		$controller = new $this->controller();
		$action_name = $this->action;
		$parameter = $this->parameter;
		$controller->$action_name($parameter);
	}
}
?>