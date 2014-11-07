<?php

class Admin_Recepten extends Controller
{
	public function __construct()
	{
		$loggedIn = isset($_SESSION['medewerkerLoggedIn']) ? $_SESSION['medewerkerLoggedIn'] : false;
		if(!$loggedIn)
		{
			return header("Location: ".BASE."/admin_auth");
		}
	}

	public function index()
	{
		return $this->view("admin/recepten/index",
			array(
				'recepten' => Recept::all()
				)
			);
	}

	public function create()
	{
		return $this->view("admin/recepten/create",
			array(
				'ingredienten' => Ingredient::all()
				)
			);
	}

	public function edit($id)
	{	
		$in = array();
		$ingredienten = Ingredient::all();
		$recept_ingredienten = ReceptIngredient::where('recept_id', '=', $id)->get();
		
		foreach($ingredienten as $key => $value) {
			$in[$value->toArray()["id"]]["aantal"] = 0;
			$in[$value->toArray()["id"]]["omschrijving"] = $value->toArray()["omschrijving"];
			$in[$value->toArray()["id"]]["id"] = $value->toArray()["id"];
		}

		foreach($recept_ingredienten as $key => $value) {
			$in[$value->toArray()["ingredient_id"]] = $value->toArray();
			$in[$value->toArray()["ingredient_id"]]["omschrijving"] = Ingredient::find($value->toArray()["ingredient_id"])->omschrijving;
		}

		return $this->view("admin/recepten/edit",
			array(
				'recept' => Recept::find($id),
				'ingredienten' => $in
				)
			);
	}

	public function destroy($id)
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return http_response_code(404);
		}
		$ingredient = new Ingredient;
		$ingredient->destroy($id);
		return http_response_code(200);
	}

	public function update($id)
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return false;
		}

		$recept = Recept::find($id);
		$recept->naam = $_POST["naam"];
		$recept->save();

		foreach($_POST as $key => $value) {

			if($key != "naam") {
				if($value != 0) {
					/*$recept_regel = ReceptIngredient::where('recept_id', '=', $id)->get();
					if($recept_regel->exists) {
						$recept_regel->recept_id = $id;
					}
					$recept_regel->ingredient_id = $key;
					$recept_regel->aantal = $value;
					//$recept_regel->save();
					*/
				}
			}
		}
		return header("Location: " . BASE . "/admin_recepten");
	}

	public function store()
	{
		if(!$_SERVER["REQUEST_METHOD"] == "POST"){
			return false;
		}
		$recept = new Recept;
		$recept->naam = $_POST["naam"];
		$recept->save();
		$recept = Recept::where('naam', '=', $_POST["naam"])->first();

		foreach($_POST as $key => $value) {
			if($key != "naam") {
				if($value != 0) {
					$recept_regel = new ReceptIngredient;
					$recept_regel->recept_id = $recept->id;
					$recept_regel->ingredient_id = $key;
					$recept_regel->aantal = $value;
					$recept_regel->save();
				}
			}
		}
		return header("Location: " . BASE . "/admin_recepten");
	}


}