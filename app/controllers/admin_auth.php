<?php

class Admin_Auth extends Controller
{

	public function index()
	{
		return $this->view("admin/auth/index",array(
			'voornaam' => isset($_SESSION['voornaam']) ? $_SESSION['voornaam'] : "",
			'loggedIn' => isset($_SESSION['loggedIn']) ? True : NULL
				));
	}

	public function login()
	{
		if(!$_SERVER["REQUEST_METHOD"] == "POST"
			|| !isset($_POST['gebruikersnaam']) || !isset($_POST['wachtwoord']))
		{
			return header("Location: ".BASE."/admin_auth");
		}

		$username = $_POST["gebruikersnaam"];
		$password = $_POST["wachtwoord"];

		$user = Medewerker::where("gebruikersnaam", "=", $username)->first();

		if(!$user){
			return header("Location: ".BASE."/admin_auth");
		}
		elseif($user && $user->wachtwoord == md5($password))
		{
			$_SESSION['medewerkerLoggedIn'] = true;
			$_SESSION['medewerker'] = $user;
			return header("Location: ".BASE."/admin_bestellingen");
		}
		else {
			return $this->view('admin/auth/index', array(
				'message' => "Onbekende combinatie!"));
		}

	}

}