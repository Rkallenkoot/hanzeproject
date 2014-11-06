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
		})->with('menus')->get();

		$results = DB::select(DB::raw("SELECT menu_soort.naam,
			menu.id,
			menu.naam,
			menu.prijs,
			FLOOR((ingredient.tv + ingredient.ib - ingredient.gr) /  recept_ingredient.aantal) AS 'Beschikbaar'
			FROM menu
			JOIN menu_soort ON (menu.menu_soort_id = menu_soort.id)
			JOIN menu_recept ON (menu.id = menu_recept.menu_id)
			JOIN recept ON (recept.id = menu_recept.recept_id)
			JOIN recept_ingredient ON (recept.id = recept_ingredient.recept_id)
			JOIN ingredient ON (recept_ingredient.ingredient_id = ingredient.id)
			WHERE menu.id IN (select menu_recept.menu_id from menu_recept)"));

		return $this->view("home/index",
			array(
				'daghap' => $daghap,
				'test' => $results,
				'soorten'	=> $soorten,
				'session'=> isset($_SESSION['menu']) ? $_SESSION['menu'] : array()
				)
			);
	}
}