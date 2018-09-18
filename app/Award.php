<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
	protected $fillable = [
		'name', 'description', 'resource_id', 'organization_id', 'creator_id'
	];

	public function resource()
	{
		return $this->belongsTo(AwardResource::class);
	}

	public function organization()
	{
		return $this->belongsTo(Organization::class);
	}

	public function creator()
	{
		return $this->belongsTo(User::class);
	}
}
