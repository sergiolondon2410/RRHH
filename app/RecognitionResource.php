<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecognitionResource extends Model
{
    public function recognitions()
    {
        return $this->hasMany(Recognition::class);
    }
}
