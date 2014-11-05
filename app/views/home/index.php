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
			<a class="navbar-brand" href="{{constant('BASE')}}/">Eat.it</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Home</a></li>

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

				<p>Bestel nu een - {{daghap[0].naam}} voor maar &euro;{{daghap[0].prijs}}!</p>
				<p><a class="btn btn-primary btn-lg" href="#" role="button">Bestellen die handel!</a></p>
			</div>
		</div>
		{% endif %}
		{% endblock %}

		{% block content %}
		<div class="row">
		<form action="{{constant('BASE')}}/order/add" method="POST">
		{% for soort in soorten %}
			<div class="col-md-3">
				<h2>{{soort.naam}}</h2>
				{% for menu in soort.menus %}
					<input type="hidden" name="menuID[]" value="{{menu.id}}">
					<h4>Menu: {{menu.naam}}</h4>
					<p>Prijs: &euro;{{menu.prijs}}</p>
					<div class="form-group">
						<label for="aantal" class="col-sm-4 control-label">Aantal</label>
							<div class="col-sm-8">
								<input id="aantal" type="number" class="form-control" name="aantal[]" value="{% if session %} session.menuid.aantal {% else %} 0 {% endif %}">
							</div>
					</div>
				{% endfor %}
				</div>
				{# <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> #}
			{% endfor %}
			<input class="btn btn-primary btn-lg" type="submit" name="bestellen" value="KOOP DAN">
			</form>
		</div>
		{% endblock %}

		{% block footer %}

		{% endblock %}