<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class upVote extends TestCase
{
    /**
     * Tests if like was created.
     *
     * @return void
     */
    public function like_create()
    {
        $new_like = Like::create([
            'id' => '999',
            'p_id' => '999'
        ]);
 
        //Check if like was created
        if ( ! $new_like)
        {
            App::abort(500, 'Some Error');
        }
 
 
        //like was created show OK message
        return Response::json(array('success' => true, 'like_create' => 1), 200);    
    }
}