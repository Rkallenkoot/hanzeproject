<?php

class Admin_Bestellingen extends Controller
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
		return $this->view("admin/bestellingen/index",
			array(
				'bestellingen_geplaatst' => Order::where('status', '=', 'geplaatst')->get(),
				'bestellingen_inbehandeling' => Order::where('status', '=', 'in bereiding')->get()
				)
			);
	}

	public function afgerond()
	{
		return $this->view("admin/bestellingen/afgerond",
			array(
				'bestellingen' => Order::where('status', '=', 'klaar')
				->where('betaald', '=', '1')
				->get(),
				'bestellingen_niet_afgerond_welbetaald' => Order::where('status', '=', 'klaar')->where('betaald', '=', '0')->get()
				)
			);
	}

	public function edit($id)
	{
		$order = Order::find($id);

		$order_regels = array();
		$order_regels[] = OrderRegel::where('order_id', '=', $order->id)->get();
		$bestelling = array();

		$bestelling["order"] = $order->toArray();
		// order regels
		foreach($order_regels[0] as $key => $value) {
			$bestelling["order"]["order_regels"][$key] = $value->toArray();

			// menus
			$menus = Menu::where('id', '=', $value->toArray()["menu_id"])->get();
			foreach($menus as $m => $enu) {
				$bestelling["order"]["order_regels"][$key]["menus"][] = $enu->toArray();

				// menu_recepten
				$menu_recepten = MenuRecept::where('menu_id', '=', $enu->toArray()["id"])->get();

				foreach($menu_recepten as $m_r => $menu_recept) {
					$bestelling["order"]["order_regels"][$key]["menus"][$m]["menu_recepten"] = $menu_recept->toArray();

					// recepten
					$recepten = Recept::where('id', '=', $menu_recept->toArray()["recept_id"])->get();
					foreach($recepten as $res => $recept) {
						$bestelling["order"]["order_regels"][$key]["menus"][$m]["menu_recepten"]["recepten"][] = $recept->toArray();

						// recept ingredienten
						$recept_ingredienten = ReceptIngredient::where('recept_id', '=', $recept->toArray()["id"])->get();
						foreach($recept_ingredienten as $res_ingr => $recept_ingredient) {
							$bestelling["order"]["order_regels"][$key]["menus"][$m]["menu_recepten"]["recepten"][$res]["recept_ingredienten"][] = $recept_ingredient->toArray();

							// ingredienten
							$ingredienten = Ingredient::where('id', '=', $recept_ingredient->toArray()["ingredient_id"])->get();
							foreach($ingredienten as $ingr => $ingredient) {
								$bestelling["order"]["order_regels"][$key]["menus"][$m]["menu_recepten"]["recepten"][$res]["recept_ingredienten"][$res_ingr]["ingredienten"][] = $ingredient->toArray();
							}
						}
					}
				}
			}
		}
		return $this->view("admin/bestellingen/edit",
			array(
				'best' => $bestelling
				)
			);
	}

	public function update($id)
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return;
		}
		$order = Order::find($id);
		$order->status = $_POST['status'];
		// als de status veranderd van "geplaatst" naar "in behandeling"
		// dan moet bij de tabel ingredienten de hoeveelheid ingredienten verwijderd worden uit gereserveerde ingredienten
		$order->betaald = $_POST['betaald'];
		$order->save();
		return header("Location: " . BASE . "/admin_bestellingen");
	}

}