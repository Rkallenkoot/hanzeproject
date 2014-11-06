<?php
// Dit is een tijdelijke fix!
use Illuminate\Database\Eloquent\Model as Eloquent;
class OrderRegel extends Eloquent
{
	/**
	 * Table used by the model
	 */
	protected $table = "order_regel";

	protected $fillable = array("menu_id", "aantal", "prijs");

	/**
	 * Timestamps should be false or
	 * an array with: "created_at" and/or "updated_at"
	 */
	public $timestamps = false;

	public function orders()
	{
		return $this->belongsTo('Order', 'order_id');
	}
}