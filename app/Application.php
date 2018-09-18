<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id', 'evaluator_id', 'status'
    ];

    public function assignation()
    {
        return $this->belongsTo(Assignation::class);
    }

    public function evaluations()
    {
        return $this->belongsToMany(Evaluation::class);
    }
}
