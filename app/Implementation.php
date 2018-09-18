<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Implementation extends Model
{
    

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
}
