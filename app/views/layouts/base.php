<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>asd</title>
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
						<a class="pull-right" href="{{ constant('BASE')}}/admin_Auth">Medewerker Login</a>
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
