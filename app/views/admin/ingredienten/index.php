{% extends 'layouts/adminbase.php' %}

{% block title %}
Eat.it or Beat it! Admin: Ingredienten overzicht
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
	<h1>Ingredienten overzicht</h1>
	<a href="{{constant('BASE')}}/admin_ingredienten/create" class="btn btn-primary">Toevoegen</a> 
	<hr>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Omschrijving</th>
				<th>Prijs</th>
				<th>TV</th>
				<th>IB</th>
				<th>GR</th>
				<th>SG</th>
				<th>Acties</th>
			</tr>
		</thead>
		<tbody>
			{% for ingr in ingredienten %}
			<tr>
				<td>{{ ingr.omschrijving }}</td>
				<td>&euro; {{ ingr.prijs }}</td>
				<td>{{ ingr.tv }}</td>
				<td>{{ ingr.ib }}</td>
				<td>{{ ingr.gr }}</td>
				<td>{{ ingr.sg }}</td>
				<td><a href="{{constant('BASE')}}/admin_ingredienten/edit/{{ ingr.id }}" class="btn btn-primary btn-sm">Bewerken</a> <a href="#" class="btn btn-danger btn-sm" onclick="confirm_destroy('{{constant('BASE')}}/admin_ingredienten/destroy/', '{{ ingr.id }}');">Verwijderen</a></td>
			</tr>
			{% endfor %}
		</tbody>
	</table>
</div>
{% endblock %}

{% block footer %}

{% endblock %}