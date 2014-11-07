<?php

class Admin_Klanten extends Controller
{

	public function index()
	{
		return $this->view("admin/klanten/index",
			array(
				'klanten' => Klant::all()
				)
			);
	}

	public function edit($id)
	{
		return $this->view("admin/klanten/edit",
			array(
				'klant' => Klant::find($id)
				)
			);
	}

	public function update($id)
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return false;
		};
		$klant = Klant::find($id);
		foreach($_POST as $key => $value) {
			$key = strtolower($key);
			$value = strtolower($value);
			$klant->$key = $value;
		}
		$klant->save();
		return header("Location: " . BASE . "/admin_klanten");
	}
}