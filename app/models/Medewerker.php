<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
class Medewerker extends Eloquent
{
	/**
	 * Table used by the model
	 */
	protected $table = "medewerker";

	protected $fillable = array("voornaam", "achternaam", "functie", "afdeling",
		"gebruikersnaam", "wachtwoord");

	/**
	 * Timestamps should be false or
	 * an array with: "created_at" and/or "updated_at"
	 */
	public $timestamps = false;

}