{% extends 'layouts/base.php' %}

{% block title %}
	Edit Location {{ loc.LocationID }}
{% endblock %}
{% block head %}

{% endblock %}

{% block content %}
<div class="container-fluid">
	<div class="row">
		<div class="col-md-5 col-md-push-1">
			<div class="page-header">
				<h1>Edit Location <small>{{ loc.StreetAddress ~ ', ' ~ loc.City }}</small></h1>
			</div>
			<a href="/locations" title="All Locations" class="btn btn-primary">All Locations</a>
			<hr>
			<form action="/locations/update" method="POST" role="form">
				<div class="form-group">
					<label for="StreetAddress">Street Address</label>
					<input type="text" class="form-control" name="StreetAddress" id="StreetAddress" placeholder="Street Address" value="{{ loc.StreetAddress }}">
				</div>
				<div class="form-group">
					<label for="PostalCode">Postal Code</label>
					<input type="text" class="form-control" name="PostalCode" id="PostalCode" placeholder="Postal Code" value="{{ loc.PostalCode }}">
				</div>
				<div class="form-group">
					<label for="City">City</label>
					<input type="text" class="form-control" name="City" id="City" placeholder="City" value="{{ loc.City }}">
				</div>
				<div class="form-group">
					<label for="StateProvince">State Province</label>
					<input type="text" class="form-control" name="StateProvince" id="StateProvince" placeholder="State Province" value="{{ loc.StateProvince }}">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>

{% endblock %}
{% block footer %}
<script src="{{ constant('ASSET_ROOT') }}/js/general.js"></script>
{% endblock %}