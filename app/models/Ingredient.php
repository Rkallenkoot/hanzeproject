<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
class Ingredient extends Eloquent
{
	/**
	 * Table used by the model
	 */
	protected $table = "ingredient";

	protected $fillable = array("omschrijving", "prijs", "tv", "ib", "gr", "sg");

	/**
	 * Timestamps should be false or
	 * an array with: "created_at" and/or "updated_at"
	 */
	public $timestamps = false;

	// Veel op veel zonder intersectie gegevens
	public function menus()
	{
		return $this->belongsToMany('Menu');
	}

	// Veel op veel met intersectie gegevens
	public function ingredienten()
	{
		return $this->belongsToMany('Ingredient')->withPivot('aantal');
	}

}