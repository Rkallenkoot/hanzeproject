<?php

class Admin_Ingredienten extends Controller
{

	public function index()
	{
		return $this->view("admin/ingredienten/index",
			array(
				'ingredienten' => Ingredient::all()
				)
			);
	}

	public function create()
	{
		return $this->view("admin/ingredienten/create");
	}

	public function edit($id)
	{
		return $this->view("admin/ingredienten/edit",
			array(
				'ingredient' => Ingredient::find($id)
				)
			);
	}

	// werkt nu gewoon zonder confirm!
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
			return;
		}

		$ingr = Ingredient::find($id);
		$ingr->omschrijving = $_POST['Omschrijving'];
		$ingr->prijs = $_POST['Prijs'];
		$ingr->tv = $_POST['TV'];
		$ingr->ib = $_POST['IB'];
		$ingr->gr = $_POST['GR'];
		$ingr->sg = $_POST['SG'];
		$ingr->save();
		return header("Location: " . BASE . "/admin_ingredienten");
	}

	public function store() 
	{
		if(!$_SERVER["REQUEST_METHOD"] == "POST"){
			return;
		}
		if(empty($_POST['Omschrijving']) || empty($_POST['Prijs']))
		{
			return header("Location: " . BASE . "/admin_ingredienten/create");
		}
		$ingr = new Ingredient(array(
			'omschrijving' => $_POST['Omschrijving'],
			'prijs' => $_POST['Prijs'],
			'tv' => $_POST['TV'],
			'ib' => $_POST['IB'],
			'gr' => $_POST['GR'],
			'sg' => $_POST['SG']));
		$ingr->save();
		return header("Location: " . BASE . "/admin_ingredienten");
	}


}