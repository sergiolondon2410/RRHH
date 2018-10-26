<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recognition extends Model
{
    protected $fillable = [
		'resource_id', 'name', 'observation', 'user_id', 'grantter_id'
	];

    public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function grantter()
	{
		return $this->belongsTo(User::class);
	}

	public function resource()
	{
		return $this->belongsTo(RecognitionResource::class);
	}
}
