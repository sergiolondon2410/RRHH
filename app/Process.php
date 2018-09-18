<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $fillable = [
        'name', 'description', 'organization_id', 'status'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
