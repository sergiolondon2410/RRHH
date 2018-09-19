<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id', 'evaluator_id', 'status'
    ];

    // public function assignation()
    // {
    //     return $this->belongsTo(Assignation::class);
    // }

    public function evaluations()
    {
        return $this->belongsToMany(Evaluation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function evaluator()
    {
        return $this->belongsTo(User::class);
    }
}
