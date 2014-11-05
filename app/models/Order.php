<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
class Order extends Eloquent
{
	/**
	 * Table used by the model
	 */
	protected $table = "order";

	protected $fillable = array("klant_id", "status", "betaald", "geplaatst");

	/**
	 * Timestamps should be false or
	 * an array with: "created_at" and/or "updated_at"
	 */
	public $timestamps = false;

	public function klanten()
	{
		return $this->belongsTo('Klant', 'klant_id');
	}

	// Veel op veel met intersectie gegevens
	public function orders()
	{
		return $this->belongsToMany('Menu')->withPivot('aantal', 'prijs');
	}
}