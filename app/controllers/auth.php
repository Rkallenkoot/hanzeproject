<?php

class Auth extends Controller
{

	public function index()
	{
		return $this->view("auth/index");
	}

	public function login()
	{
		if(!$_SERVER['REQUEST_METHOD'] == "POST" || !isset($_POST['gebruikersnaam']) || !isset($_POST['wachtwoord']))
		{
			return http_response_code(404);
		}
		// check of die in de database staat
		$username = $_POST['gebruikersnaam'];
		$password = $_POST['wachtwoord'];

		$user = Klant::where('gebruikersnaam', '=', $username)->first();

		if(!$user){
			return $this->view('auth/index',array(
				'message' => 'Onbekend gebruikersnaam'));
		}
		elseif($user && $user->wachtwoord == md5($password))
		{
			// Log in
			$_SESSION['loggedIn']       = true;
			$_SESSION['gebruikersnaam'] = $user->gebruikersnaam;
			$_SESSION['voornaam']       = $user->voornaam;
			$_SESSION['achternaam']     = $user->achternaam;
			$_SESSION['adres']          = $user->adres;
			return header("Location:".BASE."/");
		}
	}

	public function register()
	{
		if(!$_SERVER['REQUEST_METHOD'] == "POST")
		{
			return header("Location: ".BASE."/auth");
			exit();
		}
		$checks = array(
			"voornaam" => 2,
			"achternaam" => 2,
			"email" => 5,
			"adres" => 4,
			"woonplaats" => 4,
			"gebruikersnaam" => 4,
			"wachtwoord" => 4,
			"herhaal" => 4);

		foreach($checks as $check => $val)
		{
			if(empty($_POST["$check"]))
			{
				return header("Location: ".BASE."/auth/$check");
			}
			if($val && strlen($_POST[$check]) < $val)
			{
				return header("Location: ".BASE."/auth/valfail");
			}
		}
		if($_POST['wachtwoord'] !== $_POST['herhaal'])
		{
			echo "herhaal niet gelijk";
			return header("Location: ".BASE."/auth");
		}
		$user = Klant::where('gebruikersnaam','=', $_POST['gebruikersnaam'])->first();
		if($user){
			return $this->view('auth/thanku', array(
				'message' => 'Gebruikersnaam is al in gebruik.'));
		}
		$user = new Klant(array(
			"voornaam"       => isset($_POST['voornaam']) ? $_POST['voornaam'] : "",
			"achternaam"     => isset($_POST['achternaam']) ? $_POST['achternaam'] : "",
			"telefoon"       => isset($_POST['telefoon']) ? $_POST['telefoon'] : "",
			"email"          => isset($_POST['email']) ? $_POST['email'] : "",
			"adres"          => isset($_POST['adres']) ? $_POST['adres'] : "",
			"postcode"       => isset($_POST['postcode']) ? $_POST['postcode'] : "",
			"woonplaats"     => isset($_POST['woonplaats']) ? $_POST['woonplaats'] : "" ,
			"gebruikersnaam" => isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : "",
			"wachtwoord"     => isset($_POST['wachtwoord']) ? md5($_POST['wachtwoord']) : ""
			));
		$user->save();

		// rest van het bericht opstellen, inclusief extra header
		$ontvanger = $user->email;
		$onderwerp = "Bedankt voor het registeren bij Eat.it!";
		$msg = "Bedankt voor het registeren bij Eat.it!\n";
		$msg .= "Uw gebruikersnaam is: " . $user->gebruikersnaam;
		$msg .= "\nUw wachtwoord is: " . $_POST['wachtwoord'];
		$msg.="\n\nHet bericht is op " . date("d.m.Y") . " om " . date("H:i") . "u verzonden.\n";
		$msg.="\n\nMet vriendelijke groet,\n\nDe Webmaster\n\n";
		$msg.=" ---- Einde van het automatisch gegenereerde bericht----";
		//	$extra = "X-MAILER: PHP/versie " .phpversion();

		if(!mail($ontvanger,$onderwerp, $msg))
		{
			return $this->view('auth/thanku', array(
				'message' => 'Geregisteert maar geen mail verstuurd.'));
		}
		else {
			return $this->view('auth/thanku', array(
				'message' => 'Geregistreert en mail verstuurd'));
		}

		// return header("Location: ".BASE."/");
	}

	public function logout()
	{
		session_destroy();
		return header("Location: ".BASE."/");
	}

}