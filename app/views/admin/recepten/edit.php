{% extends 'layouts/adminbase.php' %}

{% block title %}
Eat.it or Beat it! Admin: Recept bewerken
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
	<h1>Recept bewerken</h1>
	<a href="{{constant('BASE')}}/admin_recepten" class="btn btn-primary">Terug</a> 
	<hr>
	<form action="{{constant('BASE')}}/admin_recepten/update/{{ recept.id }}" method="POST" role="form">
		<div class="form-group">
			<label for="naam">Naam</label>
			<input type="text" class="form-control" name="naam" id="naam" placeholder="Naam" value="{{ recept.naam }}">
		</div>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Ingredient</th>
					<th>Aantal</th>
				</tr>
			</thead>
			<tbody>
				{% for ingredient in ingredienten %}
				<tr>
					<td>
						{{ ingredient.omschrijving }}
					</td>
					<td>
						<input type="number" value="{{ ingredient.aantal }}" name="{{ ingredient.id }}" />
					</td>
				</tr>
				{% endfor %}
			</tbody>
		</table>
		<button type="submit" class="btn btn-primary">Bewerken</button>
	</form>
	
</div>
{% endblock %}

{% block footer %}

{% endblock %}