{% extends 'layouts/adminbase.php' %}

{% block title %}
Eat.it or Beat it! Admin: Klanten overzicht
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
	<h1>Klanten overzicht</h1>
	<hr>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Gebruikersnaam</th>
				<th>Voornaam</th>
				<th>Achternaam</th>
				<th>Email</th>
				<th>Telefoon</th>
				<th>Adres</th>
				<th>Postcode</th>
				<th>Woonplaats</th>
				<th>Registratiedatum</th>
				<th>Acties</th>
			</tr>
		</thead>
		<tbody>
			{% for klant in klanten %}
			<tr>
				<td>{{ klant.gebruikersnaam }}</td>
				<td>{{ klant.voornaam }}</td>
				<td>{{ klant.achternaam }}</td>
				<td>{{ klant.email }}</td>
				<td>{{ klant.telefoon }}</td>
				<td>{{ klant.adres }}</td>
				<td>{{ klant.postcode }}</td>
				<td>{{ klant.woonplaats }}</td>
				<td>{{ klant.datum_registratie }}</td>
				<td>
					<a href="{{constant('BASE')}}/admin_klanten/edit/{{ klant.id }}" class="btn btn-primary btn-sm">Bewerken</a> 
				</td>
			</tr>
			{% endfor %}
		</tbody>
	</table>
</div>
{% endblock %}

{% block footer %}

{% endblock %}