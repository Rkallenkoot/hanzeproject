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
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{constant('BASE')}}/">Eat.it or Beat it!</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{constant('BASE')}}"/>Home</a></li>

				<li><a href="{{constant('BASE')}}/auth/register">Registeren</a></li>
				<li><a href="{{constant('BASE')}}/auth/inloggen">Inloggen</a></li>
						{# <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">Nav header</li>
								<li><a href="#">Separated link</a></li>
								<li><a href="#">One more separated link</a></li>
							</ul>
						</li> #}
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		</nav>

		{% if daghap %}
		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container">
				<h1>Daghap</h1>
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
								<label class="col-xs-3 control-label">Prijs</label>
								<div class=" col-xs-8">
									<p class="form-control-static">&euro;{{menu.prijs}}</p>
								</div>
							</div>
							<div class="form-group">
								<label for="aantal" class="col-xs-3 control-label">Aantal</label>
								<div class="col-xs-8">
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