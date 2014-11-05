<?php

class Auth extends Controller
{

	public function index()
	{
		return $this->view("home/index",
			array(
				'daghap' => $daghap
				)
			);
	}



}