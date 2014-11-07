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
		<h1><img src="{{constant('ASSET_ROOT')}}/images/eatit.jpg" alt="Eat it Logo!" class="img-circle"> Medewerker Login</h1>
	</div>
</div>
{% endblock %}

{% block content %}
<div class="row">
	<div class="col-md-5">
		<form class="form-horizontal" action="{{constant('BASE')}}/admin_auth/login" role="form" method="POST">
			<legend class="text-center">Inloggen als medewerker</legend>
			<div class="form-group">
			<label for="gebruikersnaam" class="col-sm-4 control-label">Gebruikersnaam*</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="gebruikersnaam" id="gebruikersnaam" required placeholder="Gebruikers">
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-4 control-label">Password*</label>
				<div class="col-sm-8">
					<input type="password" class="form-control" name="wachtwoord" id="password" required placeholder="Password">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-6 col-sm-6">
					<input type="submit" name="medewerkerlogin" class="btn btn-success btn-block" value="Inloggen">
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-7">
		{% if message %}<h3>{{message}}</h3>{% endif %}
	</div>
</div>
{% endblock %}

{% block footer %}

{% endblock %}