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

{% if daghap %}
{#
 # Daghap "omzeilt" max input value client-side
 # Dit is natuurlijk een feature omdat het de Daghap is
 #}
<div class="jumbotron">
	<div class="container">
		<h1><img src="{{constant('ASSET_ROOT')}}/images/eatit.jpg" alt="Eat it Logo!" class="img-circle"> Daghap</h1>
		<p>Bestel nu een - {{daghap.naam}} voor maar &euro;{{daghap.prijs}}!</p>
		<p><button class="btn btn-primary btn-lg" role="button" onclick="orderMenu('{{constant('BASE')}}/orders/addMenu/{{daghap.id}}')">Bestellen die handel!</button></p>
	</div>
</div>
{% else %}
<div class="jumbotron">
	<div class="container">
		<h1><img src="{{constant('ASSET_ROOT')}}/images/eatit.jpg" alt="Eat it Logo!" class="img-circle"> Eat it or Beat it!</h1>

	</div>
</div>
{% endif %}

{% endblock %}

{% block content %}
<div class="row">
	<form class="form-horizontal" action="{{constant('BASE')}}/orders/update" method="POST" role="form">
		{% for soort in soorten %}
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">{{soort.naam}}</h3></div>
				{% for menu in soort.menus %}
				{#
				 # Twig variables are scoped to the for loop
				 # Because we need to calculate this PER menu, we define them here.
				 #}
				{% set lowestBes = NULL %}
				{% set out = NULL %}
				<div class="panel-body">
					<h4>Menu: {{menu.naam}}</h4>
					<div class="form-group">
						<label class="col-xs-3 col-md-5 control-label">Prijs</label>
						<div class=" col-xs-9 col-md-7">
							<p class="form-control-static">&euro;{{menu.prijs}}</p>
						</div>
					</div>
					<div class="form-group">
						<label for="{{menu.id}}" class="col-xs-3 col-md-5 control-label">Beschikbaar</label>
						<div class="col-xs-9 col-md-7">
							<p id="{{menu.id}}" class="form-control-static">
							{% for rec in menu.recepten if rec.ingredienten is not null %}
								{% for ing in rec.ingredienten %}
										{% if (ing.ev / ing.pivot.aantal < lowestBes) or (lowestBes is null) %}
											{% set lowestBes = (ing.ev / ing.pivot.aantal) %}
											{{lowestBes}}
										{% endif %}
								{% endfor %}
								{% else %}
									{% set out = true %}
									Niet beschikbaar
							{% endfor %}
							</p>
						</div>
					</div>
					<div class="form-group">
						<label for="aantal{{menu.id}}" class="col-xs-3 col-md-5 control-label">Aantal</label>
						<div class="col-xs-5 col-md-7">
							<input id="aantal{{menu.id}}" type="number" {{out ? 'disabled'}} class="form-control" name="menu[{{menu.id}}]" min="0" max="{{lowestBes ? lowestBes : 0}}" value="{% if session[menu.id] %}{{session[menu.id]}}{% else %}0{% endif %}">
						</div>
					</div>
				</div>
				{% endfor %}
			</div>
		</div>
		{% endfor %}

		<div class="col-md-12">
			<div class="form-group">
				<div class="col-sm-offset-8 col-sm-4">
					<input class="btn btn-primary btn-block" type="submit" name="bestellen" value="Bestelling Opslaan">
				</div>
			</div>
		</div>

	</form>
</div>
<div class="row">
<div class="col-sm-12">
{% if loggedIn %}
<form class="form-horizontal" action="{{constant('BASE')}}/orders/edit" method="POST" role="form">
	<div class="form-group">
		<div class="col-sm-12">
			<input class="btn btn-success btn-lg btn-block" type="submit" name="confirm" value="Bestelling Plaatsen">
		</div>
	</div>
</form>
{% else %}
<a href="{{constant('BASE')}}/auth" class="btn btn-info btn-lg btn-block">Log in om verder te gaan.</a>
{% endif %}
</div>
</div>
{% endblock %}

{% block footer %}

{% endblock %}