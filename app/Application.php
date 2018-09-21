<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id', 'evaluator_id', 'status', 'evaluation_id'
    ];

    // public function assignation()
    // {
    //     return $this->belongsTo(Assignation::class);
    // }

    // public function evaluations()
    // {
    //     return $this->belongsToMany(Evaluation::class);
    // }
    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
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
