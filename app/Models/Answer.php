<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //use HasFactory; dont know what this is
    public function bestanswer(){
    return $this->hasOne(Bestanswer::class, 'aid', 'qid');
}

public function likedby(User $user)
{
    return $this->likes->contains('users_id', $user->id);
}
}

