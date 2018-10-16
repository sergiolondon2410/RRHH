<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{

	protected $fillable = [
        'name', 'description', 'evaluation_type_id', 'process_id', 'creator_id'
    ];

    public function evaluation_type()
    {
        return $this->belongsTo(EvaluationType::class);
    }

    public function process()
    {
    	return $this->belongsTo(Process::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function applications() //Son la aplicaciones en las que es evaluado
    {
        return $this->hasMany(Application::class);
    }
}   
