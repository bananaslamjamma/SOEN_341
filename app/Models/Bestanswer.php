<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bestanswer extends Model
{
    public function answer(){
        //ignore this
        return $this->belongsTo(Answer::class, 'id', 'aid');
    }

}
