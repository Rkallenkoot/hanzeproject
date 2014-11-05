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
		$_SESSION['menu'] = $_POST['menu'];

		return header("Location: ".BASE."/");
	}


	public function addMenu($menu)
	{
		if(!$_SERVER['REQUEST_METHOD'] == "POST" || !isset($menu))
		{
			return "rommel is kut: ". $_SESSION['menu'];
		}
		return $_SESSION['menu'][$menu] += 1;
	}

	public function edit()
	{
		// Kan alleen als klant is ingelogd
		// Order bevestiging
		// Klant kan aflever addres nog veranderen
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