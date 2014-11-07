{% extends 'layouts/adminbase.php' %}

{% block title %}
Eat.it or Beat it! Admin: Klant Bewerken
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
	<h1>Klant bewerken</h1>
	<a href="{{constant('BASE')}}/admin_klanten" class="btn btn-primary">Terug</a> 
	<hr>
	<form action="{{constant('BASE')}}/admin_klanten/update/{{ klant.id }}" method="POST" role="form">
		<div class="form-group">
			<label for="Gebruikersnaam">Gebruikersnaam</label>
			<input type="text" class="form-control" name="Gebruikersnaam" id="Gebruikersnaam" placeholder="Gebruikersnaam" value="{{ klant.gebruikersnaam }}">
		</div>
		<div class="form-group">
			<label for="Voornaam">Voornaam</label>
			<input type="text" class="form-control" name="Voornaam" id="Voornaam" placeholder="Voornaam" value="{{ klant.voornaam }}">
		</div>
		<div class="form-group">
			<label for="Achternaam">Achternaam</label>
			<input type="text" class="form-control" name="Achternaam" id="Achternaam" placeholder="Achternaam" value="{{ klant.achternaam }}">
		</div>
		<div class="form-group">
			<label for="Email">Email</label>
			<input type="text" class="form-control" name="Email" id="Email" placeholder="Email" value="{{ klant.email }}">
		</div>
		<div class="form-group">
			<label for="Telefoon">Telefoon</label>
			<input type="text" class="form-control" name="Telefoon" id="Telefoon" placeholder="Telefoon" value="{{ klant.telefoon }}">
		</div>
		<div class="form-group">
			<label for="Adres">Adres</label>
			<input type="text" class="form-control" name="Adres" id="Adres" placeholder="Adres" value="{{ klant.adres }}">
		</div>
		<div class="form-group">
			<label for="Postcode">Postcode</label>
			<input type="text" class="form-control" name="Postcode" id="Postcode" placeholder="Postcode" value="{{ klant.postcode }}">
		</div>
		<div class="form-group">
			<label for="Woonplaats">Woonplaats</label>
			<input type="text" class="form-control" name="Woonplaats" id="Woonplaats" placeholder="Woonplaats" value="{{ klant.woonplaats }}">
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
{% endblock %}

{% block footer %}

{% endblock %}