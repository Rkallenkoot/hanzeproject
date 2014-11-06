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
		{% include 'layouts/menu.php' %}

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
						<a class="pull-right" href="{{ constant('BASE')}}/admin_auth">Medewerker Login</a>
					</p>
				</footer>
			</div>
			{# /container #}
				{% block footer %}

				{% endblock %}
			<script src="{{ constant('ASSET_ROOT')}}/js/jquery.min.js"></script>
			<script src="{{ constant('ASSET_ROOT')}}/js/bootstrap.min.js"></script>
			<script src="{{ constant('ASSET_ROOT')}}/js/general.js"></script>
		</body>
		</html>
