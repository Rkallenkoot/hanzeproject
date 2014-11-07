{% extends 'layouts/adminbase.php' %}

{% block title %}
Eat.it or Beat it! Admin: Ingredienten toevoegen
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
{% endblock %}

{% block content %}
<div class="row">
	<h1>Medewerker bewerken</h1>
	<a href="{{constant('BASE')}}/admin_medewerkers" class="btn btn-primary">Terug</a>
	<hr>
	<form action="{{constant('BASE')}}/admin_medewerkers/update/{{ medewerker.id }}" method="POST" role="form">
		<div class="form-group">
			<label for="Voornaam">Voornaam</label>
			<input type="text" class="form-control" name="Voornaam" id="Voornaam" placeholder="Voornaam" value="{{ medewerker.voornaam }}">
		</div>
		<div class="form-group">
			<label for="Achternaam">Achternaam</label>
			<input type="text" class="form-control" name="Achternaam" id="Achternaam" placeholder="Achternaam" value="{{ medewerker.achternaam }}">
		</div>
		<div class="form-group">
			<label for="Functie">Functie</label>
			<input type="text" class="form-control" name="Functie" id="Functie" placeholder="Functie" value="{{ medewerker.functie }}">
		</div>
		<div class="form-group">
			<label for="Afdeling">Afdeling</label>
			<input type="text" class="form-control" name="Afdeling" id="Afdeling" placeholder="Afdeling" value="{{ medewerker.afdeling }}">
		</div>
		<div class="form-group">
			<label for="Gebruikersnaam">Gebruikersnaam</label>
			<input type="text" class="form-control" name="Gebruikersnaam" id="Gebruikersnaam" placeholder="Gebruikersnaam" value="{{ medewerker.gebruikersnaam }}">
		</div>
		<div class="form-group">
			<label for="Wachtwoord">Wachtwoord</label>
			<input type="password" class="form-control" name="Wachtwoord" id="Wachtwoord" placeholder="Wachtwoord" value="">
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
{% endblock %}

{% block footer %}

{% endblock %}