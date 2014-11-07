<?php

class Admin_Medewerkers extends Controller
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
		return $this->view("admin/medewerkers/index",
			array(
				'medewerkers' => Medewerker::all()
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