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
<div class="row">
	<div class="col-md-8">
		<h3>Uw ordernummer is : <strong>{{order.id}}</strong></h3>
		<h4>U kunt uw bestelling verwachten op : <strong>{{klant.adres ~ ' ' ~ klant.woonplaats}}</strong></h4>
	</div>
</div>
{% endblock %}

{% block footer %}

{% endblock %}