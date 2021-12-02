<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class isLoggedin extends TestCase
{
    /** @test */
    function login()
    {                   

        $user = factory(User::class)->create([
            'name' => 'John',
            'email' => 'john@hotmail.com', 
            'password' => '12345678'
        ]);     

        $response = $this->post('login', [
            'email' => 'john@gmail.com',
            'password' => '12345678'          
        ]);

        //this works
        $response->assertRedirect('/home');

        //this fails 
        $this->assertTrue(Auth::check());
    }
}

