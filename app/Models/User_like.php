<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_like extends Model
{
    #defines relationship between models
    public function users(){
        return $this->belongsTo(User::class);
      }
}
