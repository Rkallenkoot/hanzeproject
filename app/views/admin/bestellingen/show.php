{% extends 'layouts/adminbase.php' %}

{% block title %}
Eat.it or Beat it! Admin: Bestelling overzicht
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
{% endblock %}

{% block content %}
<div class="row">
	<h1>Bestelling overzicht</h1>
	<hr>

	<div class="col-md-7">
		{% for regel in best.order.order_regels %}
		<div>
			<ul style="list-style: none;">
				{% for menu in regel.menus %}
				<li>
					<h3>Menu: {{ menu.naam }} - aantal({{ regel.aantal }})</h3>
					<ul>
						{% for recept in menu.menu_recepten.recepten %}
						<li>
							Recept: {{ recept.naam }}
							{% for recept_ingredient in recept.recept_ingredienten %}
							<ul>
								{% for ingredient in recept_ingredient.ingredienten %}
								<li>
									Ingredient: {{ ingredient.omschrijving }} - Aantal({{ recept_ingredient.aantal }})
								</li>
								{% endfor %}
							</ul>
							{% endfor %}
						</li>
						{% endfor %}
					</ul>
				</li>
				{% endfor %}
			</ul>
		</div>
		{% endfor %}
	</div>
	<div class="col-md-5">
		<form class="form-horizontal" action="{{constant('BASE')}}/admin_bestellingen/update/{{ best.order.id }}" role="form" method="POST">
			<div class="form-group">
				<label for="status" class="col-sm-4 control-label">Status</label>
				<div class="col-sm-8">
					<!-- moet een select box worden -->
					<input type="text" class="form-control" name="status" id="status" placeholder="status" value="{{ best.order.status }}">
				</div>
			</div>
			<div class="form-group">
				<label for="betaald" class="col-sm-4 control-label">Betaald</label>
				<div class="col-sm-8">
					<!-- moet een select box worden -->
					<input type="text" class="form-control" name="betaald" id="betaald" placeholder="betaald" value="{{ best.order.betaald }}">
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-6 col-sm-6">
					<button type="submit" class="btn btn-success btn-block">Aanpassen</button>
				</div>
			</div>
		</form>

		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Ingredient</th>
					<th>Aantal</th>
				</tr>
			</thead>
			<tbody>
				
				{% for regel in best.order.order_regels %}
				{% for menu in regel.menus %}
				{% for recept in menu.menu_recepten.recepten %}
				{% for recept_ingredient in recept.recept_ingredienten %} {% set totaal = [0] %}
				{% for ingredient in recept_ingredient.ingredienten %}
				{% set totaal = [totaal[0] + (recept_ingredient.aantal * regel.aantal)] %}
				<tr>
					<td>{{ ingredient.omschrijving }}</td>
					<td>{{ totaal[0] }}</td>
				</tr>
				

				{% endfor %}
				{% endfor %}
				{% endfor %}
				{% endfor %}
				{% endfor %}
			</tbody>
		</table>
	</div>

	
</div>
{% endblock %}

{% block footer %}

{% endblock %}

{# Dit is totaal bedrag! 
	{% set totaal = [0] %}
	{% for menu in best.order.order_regels %}
	{% set totaal = [ totaal[0] + (menu.aantal * menu.prijs)] %}
	{% endfor %}
	<h3>Totaal bedrag: &euro;{{ totaal[0] }}</h3>
	#}