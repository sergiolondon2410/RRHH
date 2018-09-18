<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accomplishment extends Model
{
    use SoftDeletes;

	protected $fillable = [
		'award_id', 'observation', 'user_id', 'giver_id'
	];

	public function award()
	{
		return $this->belongsTo(Award::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function organization()
	{
		return $this->belongsTo(User::class, 'user_id', 'organization_id');
	}

	public function giver()
	{
		return $this->belongsTo(User::class);
	}
}
