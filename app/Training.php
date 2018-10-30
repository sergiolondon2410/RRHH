<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
	protected $fillable = [
		'observation', 'user_id', 'status'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
