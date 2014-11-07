{% extends 'layouts/adminbase.php' %}

{% block title %}
Eat.it or Beat it! Admin: Menu Soort Toevoegen
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
	<h1>Menu soort toevoegen</h1>
	<a href="{{constant('BASE')}}/admin_menu_soorten" class="btn btn-primary">Terug</a> 
	<hr>
	<form action="{{constant('BASE')}}/admin_menu_soorten/store" method="POST" role="form">
		<div class="form-group">
			<label for="naam">Naam</label>
			<input type="text" class="form-control" name="naam" id="naam" placeholder="naam">
		</div>
		<button type="submit" class="btn btn-primary">Toevoegen</button>
	</form>
</div>
{% endblock %}

{% block footer %}

{% endblock %}