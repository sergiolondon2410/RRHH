<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scale extends Model
{
    protected $fillable = [
        'name', 'type', 'description'
    ];

    public function measures()
    {
        return $this->hasMany(Measure::class);
    }
}
