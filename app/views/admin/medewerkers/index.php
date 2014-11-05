{% extends 'layouts/adminbase.php' %}

{% block title %}
Eat.it or Beat it! Admin: Medewerkers overzicht
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
	<h1>Medewerkers overzicht</h1>
	<a href="{{constant('BASE')}}/admin_medewerkers/create" class="btn btn-primary">Toevoegen</a> 
	<hr>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Voornaam</th>
				<th>Achternaam</th>
				<th>Functie</th>
				<th>Afdeling</th>
				<th>Gebruikersnaam</th>
				<th>Wachtwoord</th>
				<th>Acties</th>
			</tr>
		</thead>
		<tbody>
			{% for med in medewerkers %}
			<tr>
				<td>{{ med.voornaam }}</td>
				<td>{{ med.achternaam }}</td>
				<td>{{ med.functie }}</td>
				<td>{{ med.afdeling }}</td>
				<td>{{ med.gebruikersnaam }}</td>
				<td>****</td>
				<td><a href="{{constant('BASE')}}/admin_medewerkers/edit/{{ med.id }}" class="btn btn-primary btn-sm">Bewerken</a> <a href="#" class="btn btn-danger btn-sm" onclick="confirm_destroy('{{constant('BASE')}}/admin_medewerkers/destroy/', '{{ med.id }}');">Verwijderen</a></td>
			</tr>
			{% endfor %}
		</tbody>
	</table>
</div>
{% endblock %}

{% block footer %}

{% endblock %}