{% extends 'layouts/base.php' %}

{% block title %}
Eat.it or Beat it!
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
<div class="jumbotron">
	<div class="container">
		<h1><img src="{{constant('ASSET_ROOT')}}/images/eatit.jpg" alt="Eat it Logo!" class="img-circle"> Bevestig de bestelling!</h1>

	</div>
</div>
{% endblock %}

{% block content %}

<div class="row">
	{% if msg %}<h2>{{msg}}</h2>{% endif %}
	<div class="col-md-8">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Naam</th>
					<th>Aantal</th>
					<th>Prijs</th>
				</tr>
			</thead>
			<tbody>
				{% for m in menu %}
				<tr>
					<td>{{m.naam}}</td>
					<td>{{m.aantal}}</td>
					<td>{{m.prijs}}</td>
				</tr>
				{% endfor %}
				<tr>
				<td></td>
				<td><strong>Totaal:</strong></td>
				<td><strong>&euro;{{totaal}}</strong</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<form class="form-horizontal" action="{{constant('BASE')}}/orders/add" method="POST" role="form">
			{% for m in menu %}
			<input type="hidden" name="order[{{m.id}}]" value="{{m.aantal}}">
			{% endfor %}
			<div class="form-group">
				<label class="col-xs-4 col-sm-2 control-label">Voornaam</label>
				<div class="col-xs-8 col-sm-10">
					<p class="form-control-static">{{klant.voornaam}}</p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-4 col-sm-2 control-label">Achternaam</label>
				<div class="col-xs-8 col-sm-10">
					<p class="form-control-static">{{klant.achternaam}}</p>
				</div>
			</div>
			<div class="form-group">
				<label for="adres" class="col-xs-4 col-sm-2 control-label">Afleveradres*</label>
				<div class="col-xs-8 col-sm-10">
					<input type="text" class="form-control" id="adres" name="adres" placeholder="Afleveradres" required value="{{klant.adres}}">
				</div>
			</div>
			<div class="form-group">
				<label for="postcode" class="col-xs-4 col-sm-2 control-label">Postcode</label>
				<div class="col-xs-8 col-sm-10">
					<input type="text" class="form-control" name="postcode" id="postcode" placeholder="Postcode" value="{{klant.postcode}}">
				</div>
			</div>
			<div class="form-group">
				<label for="adres" class="col-xs-4 col-sm-2 control-label">Woonplaats*</label>
				<div class="col-xs-8 col-sm-10">
					<input type="text" class="form-control" required id="woonplaats" name="woonplaats" placeholder="Woonplaats" value="{{klant.woonplaats}}">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-3 col-md-6">
					<input class="btn btn-success btn-lg btn-block" type="submit" name="confirm" value="Bestelling bevestigen">
				</div>
			</div>
		</form>

	</div>
</div>

{% endblock %}

{% block footer %}

{% endblock %}