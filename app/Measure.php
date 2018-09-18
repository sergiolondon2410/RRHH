<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    protected $fillable = [
        'qualification', 'alias', 'numeric_value', 'description', 'scale_id'
    ];

    public function scale()
    {
        return $this->belongsTo(Scale::class);
    }
}
