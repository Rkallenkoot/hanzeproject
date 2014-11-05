<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
class MenuSoort extends Eloquent
{
	/**
	 * Table used by the model
	 */
	protected $table = "menu_soort";

	protected $fillable = array("naam");

	/**
	 * Timestamps should be false or
	 * an array with: "created_at" and/or "updated_at"
	 */
	public $timestamps = false;

	public function menus()
	{
		return $this->hasMany('Menu');
	}

}