<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignation extends Model
{
    
    protected $fillable = [
        'tested_id', 'evaluation_id'
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
}
