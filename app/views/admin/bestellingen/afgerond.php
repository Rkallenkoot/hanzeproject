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
	<h1>Afgeronde bestellingen</h1>
	<hr>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Klant</th>
				<th>Status</th>
				<th>Betaald</th>
				<th>Geplaatst</th>
				<th>Acties</th>
			</tr>
		</thead>
		<tbody>
			{% for best in bestellingen %}
			<tr>
				<td>{{ best.id }}</td>
				<td>{{ best.klant_id }}</td>
				<td>{{ best.status }}</td>
				<td>{{ best.betaald }}</td>
				<td>{{ best.geplaatst }}</td>
				<td><a href="{{constant('BASE')}}/admin_bestellingen/show/{{ best.id }}" class="btn btn-primary btn-sm">Bekijk</a> 
					<a href="{{constant('BASE')}}/admin_bestellingen/edit/{{ best.id }}" class="btn btn-primary btn-sm">Bewerken</a> 
					<a href="#" class="btn btn-danger btn-sm" onclick="confirm_destroy('{{constant('BASE')}}/admin_bestellingen/destroy/', '{{ best.id }}');">Verwijderen</a></td>
			</tr>
			{% endfor %}
		</tbody>
	</table>
</div>
{% endblock %}

{% block footer %}

{% endblock %}