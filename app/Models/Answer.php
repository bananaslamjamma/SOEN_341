<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Answer extends Model
{
    use HasFactory, Searchable;
    
    const SEARCHABLE_FIELDS = ['qid', 'content'];
    
    public function toSearchableArray()
    {
        return $this->only(self::SEARCHABLE_FIELDS);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likedby(User $user)
    {
        return $this->likes->contains('users_id', $user->id);
    }
}
