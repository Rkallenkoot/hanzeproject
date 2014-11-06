{% extends 'layouts/adminbase.php' %}

{% block title %}
Eat.it or Beat it! Admin: Bestelling overzicht
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
	<h1>Bestelling overzicht</h1>
	<hr>

	<div class="col-md-7">
		{% for menu in best.menus %}
			<br>{{ menu.aantal }}
		{% endfor %}
	</div>
	<div class="col-md-5">right</div>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Klant</th>
				<th>Status</th>
				<th>Betaald</th>
				<th>Geplaatst</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ best.order.id }}</td>
				<td>{{ best.order.klant_id }}</td>
				<td>{{ best.order.status }}</td>
				<td>{{ best.order.betaald }}</td>
				<td>{{ best.order.geplaatst }}</td>
				</tr>
		</tbody>
	</table>
</div>
{% endblock %}

{% block footer %}

{% endblock %}