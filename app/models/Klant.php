<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
class Klant extends Eloquent
{
	/**
	 * Table used by the model
	 */
	protected $table = "klant";

	protected $fillable = array("voornaam", "achternaam", "email", "telefoon",
		"adres", "postcode", "woonplaats", "gebruikersnaam", "wachtwoord");

	/**
	 * Timestamps should be false or
	 * an array with: "created_at" and/or "updated_at"
	 */
	public $timestamps = false;

	public function orders()
	{
		return $this->hasMany('Order');
	}

}