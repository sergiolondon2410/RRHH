<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'measure_id', 'question_id', 'application_id'
    ];
}
