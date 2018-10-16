<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compromise extends Model
{
	protected $fillable = [
		'user_id', 'validator_id', 'activity', 'observation', 'ending', 'status'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function validator()
	{
		return $this->belongsTo(User::class);
	}

	public function alerts()
	{
		return $this->hasMany(CompromiseAlert::class);
	}
}