<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aplication extends Model
{
    //
    protected $fillable = [
        'implementation_id', 'evaluator_id', 'user_id'
    ];

    public function implementation()
    {
        return $this->belongsTo(Implementation::class);
    }
}
