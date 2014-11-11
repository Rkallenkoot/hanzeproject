<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
class Ingredient extends Eloquent
{
	/**
	 * Table used by the model
	 */
	protected $table = "ingredient";

	protected $fillable = array("omschrijving", "prijs", "tv", "ib", "gr", "sg");

	protected $appends = array("ev");
	/**
	 * Timestamps should be false or
	 * an array with: "created_at" and/or "updated_at"
	 */
	public $timestamps = false;

	// Veel op veel met intersectie gegevens
	public function recepten()
	{
		return $this->belongsToMany('Recept', 'recept_ingredient')->withPivot('aantal');
	}

	public function getEvAttribute()
	{
		return $this->tv + $this->ib - $this->gr;
	}

	public function isOpVooraad()
	{
		return $this->ev > 0 ? TRUE : FALSE;
	}

}