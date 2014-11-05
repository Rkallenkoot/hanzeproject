<?php

class Order extends Controller
{

	public function index()
	{
		echo "bami";
	}

	public function add()
	{
		echo "<pre>";
		echo print_r($_POST);
		echo "</pre>";
	}
}