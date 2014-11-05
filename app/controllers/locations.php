<?php

class Locations extends Controller
{

	// GET index
	public function index()
	{
		$locations = Location::all();
		return $this->view("locations/index", array(
			'locations' => $locations));
	}

	// GET create
	// Displays form to create Location
	public function create()
	{
		return $this->view('locations/create');
	}

	// POST store
	// Stores a new Location
	public function store()
	{
		if(!$_SERVER["REQUEST_METHOD"] == "POST"){
			return;
		}
		if(empty($_POST['StreetAddress']) || empty($_POST['PostalCode'])
			|| empty($_POST['City']) || empty($_POST['StateProvince']))
		{
			return header("Location: /locations/create");
		}
		$location = new Location(array(
			'StreetAddress' => $_POST['StreetAddress'],
			'PostalCode'    => $_POST['PostalCode'],
			'City'          => $_POST['City'],
			'StateProvince' => $_POST['StateProvince'],
			'CountryID'     => 0));
		// Default CountryID to 0, because we're not using that atm.
		$location->save();
		return header("Location: /locations");
	}

	// GET edit
	// Shows the edit form for the specified Location
	public function edit($id)
	{
		$location = Location::find($id);
		return $this->view('locations/edit',
			array('loc' => $location));
	}

	// POST update
	// Updates the specified Location
	public function update($id)
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return;
		}
		$loc = Location::find($id);
		$loc->StreetAddress = $_POST['StreetAddress'];
		$loc->PostalCode = $_POST['PostalCode'];
		$loc->City = $_POST['City'];
		$loc->StateProvince = $_POST['StateProvince'];
		// $lob->CountryID = $_POST['CountryID']; // Not in use atm.
		$loc->save();
		return header("Location: /locations");
	}

	// DELETE
	// Deletes the specified Location
	public function destroy($id)
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return http_response_code(404);
		}
		$location = new Location;
		$location->destroy($id);
		return http_response_code(200);
	}

}