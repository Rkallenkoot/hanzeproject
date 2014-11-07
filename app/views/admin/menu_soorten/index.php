{% extends 'layouts/adminbase.php' %}

{% block title %}
Eat.it or Beat it! Admin: Menu Soorten Overzicht
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
	<h1>Menu soorten overzicht</h1>
	<a href="{{constant('BASE')}}/admin_menu_soorten/create" class="btn btn-primary">Toevoegen</a> 
	<hr>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Naam</th>
				<th>Acties</th>
			</tr>
		</thead>
		<tbody>
			{% for menu_soort in menu_soorten %}
			<tr>
				<td>{{ menu_soort.id }}</td>
				<td>{{ menu_soort.naam }}</td>
				<td>
					<a href="{{constant('BASE')}}/admin_menu_soorten/edit/{{ menu_soort.id }}" class="btn btn-primary btn-sm">Bewerken</a> 
					<a href="#" class="btn btn-primary btn-sm" onclick="confirm_destroy('{{constant('BASE')}}/admin_menu_soorten/destroy/', '{{ menu_soort.id }}');">Verwijderen</a> 
				</td>
			</tr>
			{% endfor %}
		</tbody>
	</table>
</div>
{% endblock %}

{% block footer %}

{% endblock %}