<?php
class Controller
{
	protected $model;

	public function model($model)
	{
		require_once INC_ROOT . '/app/models/' . ucfirst($model) . ".php";

		return new $model();
	}

	public function view($viewName, $data = null)
	{
		$view = new View($viewName, $data);
		echo $view;
	}
}