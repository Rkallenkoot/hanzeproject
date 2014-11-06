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
		<h1><img src="{{constant('ASSET_ROOT')}}/images/eatit.jpg" alt="Eat it Logo!" class="img-circle"> {{message}}</h1>
	</div>
</div>
{% endblock %}

{% block content %}
{{extra}}
{% endblock %}

{% block footer %}

{% endblock %}