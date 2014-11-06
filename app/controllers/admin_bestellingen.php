<?php

class Admin_Bestellingen extends Controller
{

	public function index()
	{
		return $this->view("admin/bestellingen/index",
			array(
				'bestellingen_geplaatst' => Order::where('status', '=', 'geplaatst')->get(),
				'bestellingen_inbehandeling' => Order::where('status', '=', 'in bereiding')
				->orWhere('status', '=', 'klaar')
				->where('betaald', '=', '0')
				->get()
				)
			);
	}

	public function afgerond() 
	{
		return $this->view("admin/bestellingen/afgerond",
			array(
				'bestellingen' => Order::where('status', '=', 'klaar')->where('betaald', '=', '1')->get()
				)
			);
	}

	public function show($id)
	{
		$order = Order::find($id);

		$order_regels = array();
		$order_regels[] = OrderRegel::where('order_id', '=', $order->id)->get();
		$bestelling = array();
		
		$bestelling["order"] = $order->toArray();

		/*
		order hebben order_regels
		order_regels hebben menus
		menus hebben recepten
		recepten hebben ingredienten
		*/

		echo "<pre>";
		// order regels
		foreach($order_regels[0] as $key => $value) {
			$bestelling["order"]["order_regels"][$key] = $value->toArray();
			
			// menus
			$menus = Menu::where('id', '=', $value->toArray()["menu_id"])->get();
			foreach($menus as $m => $enu) {
				$bestelling["order"]["order_regels"][$key]["menus"][] = $enu->toArray();
				
				// recepten
				$menu_recepten = MenuRecept::where('menu_id', '=', $enu->toArray()["id"])->get();

				foreach($menu_recepten as $m_r => $menu_recept) {
					$bestelling["order"]["order_regels"][$key]["menus"][$m]["menu_recepten"] = $menu_recept->toArray();

					$recepten = Recept::where('id', '=', $menu_recept->toArray()["recept_id"])->get();
					foreach($recepten as $res => $recept) {
						$bestelling["order"]["order_regels"][$key]["menus"][$m]["menu_recepten"]["recepten"][] = $recept->toArray();

						$recept_ingredienten = ReceptIngredient::where('recept_id', '=', $recept->toArray()["id"])->get();
						foreach($recept_ingredienten as $res_ingr => $recept_ingredient) {
							$bestelling["order"]["order_regels"][$key]["menus"][$m]["menu_recepten"]["recepten"][$res]["recept_ingredienten"][] = $recept_ingredient->toArray();

							$ingredienten = Ingredient::where('id', '=', $recept_ingredient->toArray()["ingredient_id"])->get();
							//print_r($ingredienten->toArray());
							foreach($ingredienten as $ingr => $ingredient) {
								//print_r($ingredient->toArray());
								$bestelling["order"]["order_regels"][$key]["menus"][$m]["menu_recepten"]["recepten"][$res]["recept_ingredienten"][$res_ingr]["ingredienten"][] = $ingredient->toArray();

							}
						}
					}
				}
			}
		}

		/*foreach($order_regels[0] as $key => $value) {
			$bestelling["orders"][$key] = $value->toArray();
			$recepten = array();
			$menus = Menu::where('id', '=', $bestelling["orders"][$key]["menu_id"])->get()->toArray();
			foreach($menus as $m => $enu) {
				$bestelling["orders"][$key]["menus"]["menu"] = $enu;

				$recepten[] = MenuRecept::where('menu_id', '=', $bestelling["orders"][$key]["menu_id"])->get()->toArray();
				$ingredienten = array();
				
				foreach($recepten as $k => $rec) {
					$bestelling["orders"][$key]["menus"]["recepten"]["recept"] = $rec[0];
					
					$recept[] = Recept::where("id", '=', $rec[0]["recept_id"])->get()->toArray()[0];
					foreach($recept as $k1 => $ingredient) {
						$bestelling["orders"][$key]["menus"]["recepten"]["recept"]["ingredient"][] = $ingredient;
						//$bestelling["orders"][$key]["menus"][$k]["recepten"]["ingredienten"][$] = $ingredient;
					}
				}
			}
		}*/
		
		print_r($bestelling);
		echo "</pre>";
		return $this->view("admin/bestellingen/show",
			array(
				'bestelling' => Order::find($id),
				'best' => $bestelling
				)
			);
	}

	public function create()
	{
		return $this->view("admin/medewerkers/create");
	}

	public function edit($id)
	{
		return $this->view("admin/medewerkers/edit",
			array(
				'medewerker' => Medewerker::find($id)
				)
			);
	}

	// werkt nu gewoon zonder confirm!
	public function destroy($id)
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return http_response_code(404);
		}
		$medewerker = new Medewerker;
		$medewerker->destroy($id);
		return http_response_code(200);
	}

	public function update($id) 
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return;
		}

		$med = Medewerker::find($id);
		$med->voornaam = $_POST['Voornaam'];
		$med->achternaam = $_POST['Achternaam'];
		$med->functie = $_POST['Functie'];
		$med->afdeling = $_POST['Afdeling'];
		$med->gebruikersnaam = $_POST['Gebruikersnaam'];

		if($_POST["Wachtwoord"] != "") {
			$med->wachtwoord = md5($_POST['Wachtwoord']);
		}
		$med->save();
		return header("Location: " . BASE . "/admin_medewerkers");
	}

	public function store() 
	{
		if(!$_SERVER["REQUEST_METHOD"] == "POST"){
			return;
		}
		if(empty($_POST['Voornaam']) || empty($_POST['Achternaam'])
			|| empty($_POST['Functie']) || empty($_POST['Gebruikersnaam'])
			|| empty($_POST['Wachtwoord']))
		{
			return header("Location: " . BASE . "/admin_medewerkers/create");
		}
		$med = new Medewerker(array(
			'voornaam' => $_POST['Voornaam'],
			'achternaam' => $_POST['Achternaam'],
			'functie' => $_POST['Functie'],
			'afdeling' => $_POST['Afdeling'],
			'gebruikersnaam' => $_POST['Gebruikersnaam'],
			'wachtwoord' => md5($_POST['Wachtwoord'])
			));
		$med->save();
		return header("Location: " . BASE . "/admin_medewerkers");
	}


}