<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
class Afdeling extends Eloquent
{
	/**
	 * Table used by the model
	 */
	protected $table = "afdeling";

	protected $fillable = array("naam");

	/**
	 * Timestamps should be false or
	 * an array with: "created_at" and/or "updated_at"
	 */
	public $timestamps = false;

	// Veel op veel zonder intersectie gegevens
	public function medewerkers()
	{
		return $this->belongsToMany('Medewerker');
	}
}