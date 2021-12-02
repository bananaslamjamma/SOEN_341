<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class testLogin extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLoginPost(){
        Session::start();
        $response = $this->call('POST', '/login', [
            'email' => 'badUsername@gmail.com',
            'password' => 'badPass',
            '_token' => csrf_token()
        ]);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('auth.login', $response->original->name());
    }
    
}
