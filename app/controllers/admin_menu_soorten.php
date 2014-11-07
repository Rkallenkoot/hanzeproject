<?php

class Admin_Menu_Soorten extends Controller
{

	public function index()
	{
		return $this->view("admin/menu_soorten/index",
			array(
				'menu_soorten' => MenuSoort::orderBy('id')->get()
				)
			);
	}

	public function edit($id)
	{
		return $this->view("admin/menu_soorten/edit",
			array(
				'menu_soort' => MenuSoort::find($id)
				)
			);
	}

	public function update($id)
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return false;
		};
		$menu_soort = MenuSoort::find($id);
		foreach($_POST as $key => $value) {
			$key = strtolower($key);
			$value = ($value);
			$menu_soort->$key = $value;
		}
		$menu_soort->save();
		return header("Location: " . BASE . "/admin_menu_soorten");
	}

	public function create()
	{
		return $this->view("admin/menu_soorten/create");
	}

	public function store()
	{
		if(!$_SERVER["REQUEST_METHOD"] == "POST"){
			return false;
		}
		if(empty($_POST['naam']))
		{
			return header("Location: " . BASE . "/admin_menu_soorten/create");
		}
		$menu_soort = new MenuSoort(array(
			'naam' => $_POST['naam'])
		);
		$menu_soort->save();
		return header("Location: " . BASE . "/admin_menu_soorten");
	}

	public function destroy($id)
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return http_response_code(404);
		}
		$menu_soort = new MenuSoort;
		$menu_soort->destroy($id);
		return http_response_code(200);
	}


}