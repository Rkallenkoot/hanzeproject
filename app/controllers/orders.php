<?php

class Orders extends Controller
{

	public function index()
	{
		echo "bami";
	}

	public function add()
	{
		if(!$_SERVER['REQUEST_METHOD'] == "POST"
			&& !isset($_POST['confirm']))
		{
			return header("Location: ".BASE."/");
		}
		// gebruiker ingelogd of niet?
		if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'])
		{
			return header("Location: ".BASE."/");
		}

		// Kijken welke klant deze order probeert te bestellen
		$klant = Klant::where('id', '=', $_SESSION['userid'])->first();

		$klant->adres      = $_POST['adres'];
		$klant->woonplaats = $_POST['woonplaats'];
		$klant->postcode   = $_POST['postcode'];
		// Update de klantgegevens
		$klant->save();
		// Voor elk menu kijken wat de benodigde ingredienten zijn

		// Dan kijken of deze aanwezig zijn

		// Order plaatsen als dat mogelijk is
		$newOrder = new Order(array("klant_id" => $klant->id));
		$newOrder->save();

		foreach($_POST['order'] as $menu => $aantal)
		{
			// Volledig menu selecteren
			$m = Menu::where("id", '=', $menu)->first();
			$newOrder->menus()->save($m,
				array('aantal' => $aantal, 'prijs' => $m->prijs));
		}

		return $this->view('order/thanku', array(
			"message" => "Bedankt voor het bestellen",
			"order" => $newOrder,
			'klant' => $klant,
			'loggedIn' => isset($_SESSION['loggedIn']) ? True : NULL
			));
	}

	public function update()
	{
		if (!$_SERVER['REQUEST_METHOD'] == "POST" || !isset($_POST['bestellen']))
		{
			return header("Location: ".BASE."/");
		}
		// Update the $_SESSION['menu'] with the chosen Quantities
		$_SESSION['menu'] = $_POST['menu'];

		return header("Location: ".BASE."/");
	}


	public function addMenu($menu)
	{
		if(!$_SERVER['REQUEST_METHOD'] == "POST" || !isset($menu))
		{
			return "rommel : ". $_SESSION['menu'];
		}
		return $_SESSION['menu'][$menu] += 1;
	}

	public function edit()
	{
		// Order bevestiging
		// Kan alleen als klant is ingelogd
		if(!$_SESSION['loggedIn'])
		{
			return header("Location: ".BASE."/auth");
		}

		$bestelling = false;
		$finalMenu = array();

		// Reset totaalprijs naar 0
		$totaalprijs = 0;

		// Check of er IETS in $_SESSION['menu'] hoger dan 0
		foreach($_SESSION['menu'] as $menu => $aantal)
		{
			if($aantal > 0)
			{
				$m = Menu::find($menu);
				$finalMenu[] = array(
					'id'     => $menu,
					'aantal' => $aantal,
					'naam'   => $m->naam,
					'prijs'  => $m->prijs
					);
				// Als er minimaal 1 aantal op true is
				$bestelling = true;
				// Vul de totaalprijs aan
				$totaalprijs += $m->prijs * $aantal;
			}
		}
		if(!$bestelling)
		{
			// Ongeldige bestelling
			return header("Location: ".BASE."/");
		}
		$klant = Klant::find($_SESSION['userid']);
		// Klant kan aflever addres nog veranderen

		return $this->view('order/edit',array(
			'menu' => $finalMenu,
			'klant' => $klant,
			'totaal' => $totaalprijs,
			'voornaam' => isset($_SESSION['voornaam']) ? $_SESSION['voornaam'] : "",
			'session'=> isset($_SESSION['menu']) ? $_SESSION['menu'] : array(),
			'loggedIn' => isset($_SESSION['loggedIn']) ? True : NULL
			));
	}

}