<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationType extends Model
{
    protected $fillable = [
        'name', 'description'
    ];
}
