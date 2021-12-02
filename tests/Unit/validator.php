<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class validator extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected function search_validatora($str, array $answerdata){
        if(strcmp($str,$data==false)){
        
        
        $response = $this->call('POST','Search',['word'=>'incorrectword','_token' => csrf_token()]);
        
        $this->assertEquals(str, $response->getStatusCode());
            $this->assertEquals('auth.search', $response->original->name());
            console.log("The word for the question you were looking for does not exist in the database");              
        }
        if(strcmp($str,$data==true)){
        
        $response = $this->post('Search',['word'=>'validsearch']);
        
        $response = $this->actingAs($Answers)->get(route('forum/{this.str}'));
        $response-> assertStatus(str)->assertViewIs('forum')->assertSee('Was shown!');
        }
    }
}
        


        
    

        
