<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;

class Menu extends Eloquent
{
	/**
	 * Table used by the model
	 */
	protected $table = "menu";

	protected $fillable = array("naam", "prijs", "actief", "daghap",
		"menu_soort_id");

	/**
	 * Timestamps should be false or
	 * an array with: "created_at" and/or "updated_at"
	 */
	public $timestamps = false;

	public function orders()
	{
		return $this->belongsToMany('Order', 'order_regel')->withPivot('aantal', 'prijs');
	}

	public function soort()
	{
		return $this->belongsTo('MenuSoort', 'menu_soort_id');
	}

	// Veel op veel zonder intersectie gegevens
	public function recepten()
	{
		return $this->belongsToMany('Recept');
	}

	public function daghap()
	{
		return $this::where('actief','=',true)->where('daghap','=',true)->get();
	}

}
