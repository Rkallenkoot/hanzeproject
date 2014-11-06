<?php
// Dit is een tijdelijke fix!
use Illuminate\Database\Eloquent\Model as Eloquent;
class ReceptIngredient extends Eloquent
{
	/**
	 * Table used by the model
	 */
	protected $table = "recept_ingredient";

	protected $fillable = array("recept_id", "ingredient_id", "aantal");

	/**
	 * Timestamps should be false or
	 * an array with: "created_at" and/or "updated_at"
	 */
	public $timestamps = false;
}