<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< Updated upstream

class Question extends Model
{
=======
use App\User_like;


class Question extends Model 
{


    public function likes(){
        return $this->hasMany(User_like::class);
      }
    
>>>>>>> Stashed changes
    //use HasFactory; dont know what this is
}
