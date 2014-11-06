<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{% block title %} {% endblock %}</title>
	<link rel="shortcut icon" href="{{constant('ASSET_ROOT')}}/favicon.ico" type="image/x-icon">
	<link rel="icon" href="{{constant('ASSET_ROOT')}}/favicon.ico" type="image/x-icon">
	<link href="{{ constant('ASSET_ROOT') }}/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->
			<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
			{% block head %}

			{% endblock %}
		</head>
		<body>
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
							<li><a href="{{constant('BASE')}}/admin_bestellingen">Bestellingen</a></li>
							<li><a href="{{constant('BASE')}}/admin_bestellingen/afgerond">Afgeronde bestellingen</a></li>
							<li><a href="{{constant('BASE')}}/admin_ingredienten">Ingredienten</a></li>
							<li><a href="{{constant('BASE')}}/admin_recepten">Recepten</a></li>
							<li><a href="{{constant('BASE')}}/admin_menus">Menu's</a></li>
							<li><a href="{{constant('BASE')}}/admin_menu_soorten">Menu soorten</a></li>
							<li><a href="{{constant('BASE')}}/admin_medewerkers">Medewerkers</a></li>
							<li><a href="{{constant('BASE')}}/admin_klanten">Klanten</a></li>

							<li><a href="{{constant('BASE')}}/admin_loguit">Loguit</a></li>
						</div><!--/.navbar-collapse -->
					</div>
				</nav>
			{% block header %}

			{% endblock %}
			<div class="container">
				{# Wrap content in the container #}
				{% block content %}
				{% endblock %}

				<hr>
				<footer>
					<p>
						Eat.it or Beat it! &copy; 2014
					</p>
				</footer>
			</div>
			{# /container #}
			{% block footer %}

			{% endblock %}
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="{{ constant('ASSET_ROOT')}}/js/jquery.min.js"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="{{ constant('ASSET_ROOT')}}/js/bootstrap.min.js"></script>
			<script src="{{ constant('ASSET_ROOT')}}/js/general.js"></script>
		</body>
		</html>
