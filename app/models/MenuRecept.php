<?php
// Dit is een tijdelijke fix!
use Illuminate\Database\Eloquent\Model as Eloquent;
class MenuRecept extends Eloquent
{
	/**
	 * Table used by the model
	 */
	protected $table = "menu_recept";

	protected $fillable = array("menu_id", "recept_id");

	/**
	 * Timestamps should be false or
	 * an array with: "created_at" and/or "updated_at"
	 */
	public $timestamps = false;
}