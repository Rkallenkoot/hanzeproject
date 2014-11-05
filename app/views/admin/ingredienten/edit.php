{% extends 'layouts/adminbase.php' %}

{% block title %}
Eat.it or Beat it! Admin: Ingredienten aanpassen
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
	<h1>Ingredient aanpassen</h1>
	<a href="{{constant('BASE')}}/admin_ingredienten" class="btn btn-primary">Terug</a> 
	<hr>
	<form action="{{constant('BASE')}}/admin_ingredienten/update/{{ ingredient.id }}" method="POST" role="form">
		<div class="form-group">
			<label for="Omschrijving">Omschrijving</label>
			<input type="text" class="form-control" name="Omschrijving" id="Omschrijving" placeholder="Omschrijving" value="{{ ingredient.omschrijving }}">
		</div>
		<div class="form-group">
			<label for="Prijs">Prijs</label>
			<input type="text" class="form-control" name="Prijs" id="Prijs" placeholder="Prijs" value="{{ ingredient.prijs }}">
		</div>
		<div class="form-group">
			<label for="TV">Technische voorraad</label>
			<input type="text" class="form-control" name="TV" id="TV" placeholder="Technische voorraad" value="{{ ingredient.tv }}">
		</div>
		<div class="form-group">
			<label for="IB">Aantal in bestelling</label>
			<input type="text" class="form-control" name="IB" id="IB" placeholder="Aantal in bestelling" value="{{ ingredient.ib }}">
		</div>
		<div class="form-group">
			<label for="GR">Gereserveerd</label>
			<input type="text" class="form-control" name="GR" id="GR" placeholder="GR" value="{{ ingredient.gr }}">
		</div>
		<div class="form-group">
			<label for="SG">SG</label>
			<input type="text" class="form-control" name="SG" id="SG" placeholder="SG" value="{{ ingredient.sg }}">
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
{% endblock %}

{% block footer %}

{% endblock %}