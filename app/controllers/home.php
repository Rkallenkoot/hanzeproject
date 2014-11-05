<?php

class Home extends Controller
{

	public function index()
	{

		$daghap = Menu::where('actief', '=', true)->where('daghap','=',true)->first();

		$menus = Menu::where('actief', '=', true)->with('soort')->get();

		$soorten = MenuSoort::whereHas('menus', function($q)
		{
			$q->where('actief', '=', true);
		})->with('menus')->get();
		// Aantal beschikbaar berekenen

		return $this->view("home/index",
			array(
				'daghap' => $daghap,
				'daghapdump' => $daghap,
				'soorten'	=> $soorten,
				'session'=> isset($_SESSION['menu']) ? $_SESSION['menu'] : array()
				)
			);
	}
}