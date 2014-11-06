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
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<h1><img src="{{constant('ASSET_ROOT')}}/images/eatit.jpg" alt="Eat it Logo!" class="img-circle"> Daghap</h1>
		<p>Bestel nu een - {{daghap.naam}} voor maar &euro;{{daghap.prijs}}!</p>
		<p><button class="btn btn-primary btn-lg" role="button" onclick="orderMenu('{{constant('BASE')}}/order/addMenu/{{daghap.id}}')">Bestellen die handel!</button></p>
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
<pre>
{{soorten}}
</pre>
<div class="row">
	<form class="form-horizontal" action="{{constant('BASE')}}/order/update" method="POST" role="form">
		{% for soort in soorten %}
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">{{soort.naam}}</h3></div>
				{% for menu in soort.menus %}
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
							<p id="{{menu.id}}" class="form-control-static">100</p>
						</div>
					</div>
					<div class="form-group">
						<label for="aantal" class="col-xs-3 col-md-5 control-label">Aantal</label>
						<div class="col-xs-5 col-md-7">
							<input id="aantal" type="number" class="form-control" name="menu[{{menu.id}}]" min="0" value="{% if session[menu.id] %}{{session[menu.id]}}{% else %}0{% endif %}">
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

{% if loggedIn %}
<form class="form-horizontal" action="{{constant('BASE')}}/order/add" method="POST" role="form">
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-6">
			<input class="btn btn-success btn-lg btn-block" type="submit" name="confirm" value="Bestelling Plaatsen">
		</div>
	</div>
</form>
{% endif %}
{% endblock %}

{% block footer %}

{% endblock %}