{% extends 'layouts/base.php' %}

{% block title %}
Locations
{% endblock %}
{% block head %}

{% endblock %}

{% block content %}
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9 col-md-push-1">
			<div class="page-header">
				<h1>Locations</h1>
			</div>
			<a href="/locations/create" title="Add a new Location" class="btn btn-primary">Add location</a>
			<hr>
			<table class="table table-bordered table-striped" id="sortableTable">
				<thead>
					<tr>
						<th>Street Address</th>
						<th>Postal Code</th>
						<th>City</th>
						<th>State Province</th>
					</tr>
				</thead>
				<tbody>
					{% for loc in locations %}
					<tr id="{{ loc.LocationID }}">
						<td> {{ loc.StreetAddress }}</td>
						<td> {{ loc.PostalCode }}</td>
						<td> {{ loc.City }}</td>
						<td>
							<a href="/locations/edit/{{ loc.LocationID }}" class="btn btn-primary btn-sm">Edit</a>
							<a href="#" class="btn btn-danger btn-sm" onclick="confirmDestroy('/locations/destroy/',{{ loc.LocationID }})">Delete</a>
						</td>
					</tr>
					{% endfor %}
				</tbody>
			</table>
		</div>
	</div>
</div>

{% endblock %}
{% block footer %}
<script src="{{ constant('ASSET_ROOT') }}/js/general.js"></script>
{% endblock %}