<?php

class Admin_Auth extends Controller
{

	public function index()
	{
		return $this->view("admin/medewerkers/index",
			array(
				'gaap' => "hoi"
				)
			);
	}



}