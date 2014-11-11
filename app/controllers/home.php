<?php

use Illuminate\Database\Capsule\Manager as DB;

class Home extends Controller
{

	public function index()
	{

		$daghap = Menu::where('actief', '=', true)->where('daghap','=',true)->first();

		$soorten = MenuSoort::whereHas('menus', function($q)
		{
			$q->where('menu.actief', '=', true);
		})->with('menus.recepten.ingredienten')->get();


		return $this->view("home/index",
			array(
				'daghap'   => $daghap,
				'soorten'  => $soorten,
				'voornaam' => isset($_SESSION['voornaam']) ? $_SESSION['voornaam'] : "",
				'session'  => isset($_SESSION['menu']) ? $_SESSION['menu'] : array(),
				'loggedIn' => isset($_SESSION['loggedIn']) ? True : NULL
				)
			);
	}
}