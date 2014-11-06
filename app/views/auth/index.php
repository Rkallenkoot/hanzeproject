{% extends 'layouts/base.php' %}

{% block title %}
Eat.it or Beat it!
{% endblock %}
{% block head %}
<style>
	body {
		padding-top: 50px;
		padding-bottom: 20px;
	}
</style>
{% endblock %}

{% block header %}
<div class="jumbotron">
	<div class="container">
		<h1><img src="{{constant('ASSET_ROOT')}}/images/eatit.jpg" alt="Eat it Logo!" class="img-circle"> Login of Registreer!</h1>
	</div>
</div>
{% endblock %}

{% block content %}
<div class="row">
	<div class="col-md-5">
		<form class="form-horizontal" action="{{constant('BASE')}}/auth/login" role="form" method="POST">
			<legend class="text-center">Inloggen</legend>
			<div class="form-group">
			<label for="gebruikersnaam" class="col-sm-4 control-label">Gebruikersnaam*</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="gebruikersnaam" id="gebruikersnaam" required placeholder="Gebruikers">
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-4 control-label">Password*</label>
				<div class="col-sm-8">
					<input type="password" class="form-control" name="password" id="password" required placeholder="Password">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-6 col-sm-6">
					<button type="submit" class="btn btn-success btn-block">Inloggen</button>
				</div>
			</div>
		</form>
	</div>

	<div class="col-md-7">
		<form class="form-horizontal" action="{{constant('BASE')}}/auth/register" role="form" method="POST">
			<legend class="text-center">Registereren</legend>
			<div class="form-group">
			<label for="Voornaam" class="col-sm-4 control-label">Voornaam*</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="voornaam" id="Voornaam" required placeholder="Voornaam">
				</div>
			</div>
			<div class="form-group">
			<label for="Achternaam" class="col-sm-4 control-label">Achternaam*</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="achternaam" id="Achternaam" required placeholder="Achternaam">
				</div>
			</div>
			<div class="form-group">
			<label for="Email" class="col-sm-4 control-label">Email*</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" name="email" id="Email" required placeholder="Email">
				</div>
			</div>
			<div class="form-group">
			<label for="Telefoon" class="col-sm-4 control-label">Telefoon</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" name="telefoon" id="Telefoon" placeholder="Telefoon">
				</div>
			</div>
			<div class="form-group">
			<label for="Adres" class="col-sm-4 control-label">Adres*</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="adres" id="Adres" required placeholder="Adres">
				</div>
			</div>
			<div class="form-group">
			<label for="Postcode" class="col-sm-4 control-label">Postcode</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="postcode" id="Postcode" placeholder="Postcode">
				</div>
			</div>
			<div class="form-group">
			<label for="Woonplaats" class="col-sm-4 control-label">Woonplaats*</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="woonplaats" id="Woonplaats" required placeholder="Woonplaats">
				</div>
			</div>
			<div class="form-group">
			<label for="Gebruikersnaam" class="col-sm-4 control-label">Gebruikersnaam*</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="gebruikersnaam" id="Gebruikersnaam" required placeholder="Gebruikersnaam">
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-4 control-label">Password*</label>
				<div class="col-sm-8">
					<input type="password" class="form-control" name="wachtwoord" id="password" required placeholder="Password">
				</div>
			</div>
			<div class="form-group">
				<label for="HerhaalWachtwoord" class="col-sm-4 control-label">Herhaal Password*</label>
				<div class="col-sm-8">
					<input type="password" class="form-control" name="herhaal" required id="HerhaalWachtwoord" placeholder="Herhaal Wachtwoord">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-8 col-sm-4">
					<button type="submit" class="btn btn-primary btn-block">Registreren</button>
				</div>
			</div>
		</form>
	</div>
</div>
{% endblock %}

{% block footer %}

{% endblock %}