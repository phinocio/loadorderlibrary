<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	protected $fillable = ['name'];
	public $timestamps = false;

	public function loadOrders()
	{
		return $this->hasMany('\App\Models\LoadOrder');
	}
}
