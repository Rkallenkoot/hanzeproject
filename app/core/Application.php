<?php

class Application
{

	protected $controller = "home";

	protected $method = "index";

	protected $params = array();

	public function __construct()
	{
		$url = $this->parseUrl();

		if(file_exists(INC_ROOT . "/app/controllers/" . $url[0] . ".php")) {
			$this->controller = $url[0];
			unset($url[0]);
		}

		require_once INC_ROOT . "/app/controllers/". $this->controller . ".php";

		$this->controller = new $this->controller;

		if(isset($url[1])) {
			if(method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		$this->params = $url ? array_values($url) : array();

		if(!empty($this->params))
		{
			call_user_func_array(array($this->controller, $this->method), $this->params);
		} else {
			call_user_func(array($this->controller, $this->method));
		}

	}

	protected function parseUrl()
	{
		$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
		$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
		if (strstr($uri, '?')){
			$uri = substr($uri, 0, strpos($uri, '?'));
		}
		$uri = explode('/', trim($uri, '/'));
		return $uri;
	}
}