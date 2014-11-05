<?php

class Home extends Controller
{

	public function index()
	{
		$daghap = Menu::find(1)->with('soort')->get();

		$menus = Menu::where('actief', '=', true)->with('soort')->get();

		$soorten = MenuSoort::whereHas('menus', function($q)
		{
			$q->where('actief', '=', true);
		})->with('menus')->get();

		return $this->view("home/index",
			array(
				'daghap' => $daghap,
				'soorten'	=> $soorten,
				'session'=> $_SESSION
				)
			);
	}
}