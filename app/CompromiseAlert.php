<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompromiseAlert extends Model
{
	protected $fillable = [
		'compromise_id', 'date', 'status'
	];

	public function compromise()
	{
		return $this->belongsTo(Compromise::class);
	}
}