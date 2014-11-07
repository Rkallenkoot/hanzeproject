{% extends 'layouts/adminbase.php' %}

{% block title %}
Eat.it or Beat it! Admin: Recepten overzicht
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
	<h1>Recepten overzicht</h1>
	<a href="{{constant('BASE')}}/admin_recepten/create" class="btn btn-primary">Toevoegen</a> 
	<hr>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Naam</th>
				<th>Acties</th>
			</tr>
		</thead>
		<tbody>
			{% for recept in recepten %}
			<tr>
				<td>{{ recept.naam }}</td>
				<td>
					<a href="{{constant('BASE')}}/admin_recepten/edit/{{ recept.id }}" class="btn btn-primary btn-sm">Bewerken</a> 
					<a href="#" class="btn btn-danger btn-sm" onclick="confirm_destroy('{{constant('BASE')}}/admin_recepten/destroy/', '{{ recept.id }}');">Verwijderen</a>
				</td>
			</tr>
			{% endfor %}
		</tbody>
	</table>
</div>
{% endblock %}

{% block footer %}

{% endblock %}