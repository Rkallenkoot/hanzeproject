<?php

class Order extends Controller
{

	public function index()
	{
		echo "bami";
	}

	public function add()
	{
		if(!$_SERVER['REQUEST_METHOD'] == "POST" && !isset($_POST['placeOrder']))
		{
			return header("Location: ".BASE."/");
		}
		// Kunnen de order plaatsen en de gebruiker redirecten naar /order/edit
		// Daar kan de gebruiker eventueel afleverafdres wijzigen
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
		$totaalprijs = 0;
		// Check of er IETS in $_SESSION['menu'] hoger dan 0
		foreach($_SESSION['menu'] as $menu => $aantal)
		{
			if($aantal > 0)
			{
				$m = Menu::find($menu);
				$finalMenu[] = array(
					$menu => array(
						'aantal' => $aantal,
						'naam'   => $m->naam,
						'prijs'  => $m->prijs
						));
				// Als er minimaal 1 aantal op true is
				$bestelling = true;
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

	public function confirm()
	{

	}

	public function test()
	{
		echo "<pre>";
		var_dump($_SESSION['menu']);
		echo "</pre>";
	}
}