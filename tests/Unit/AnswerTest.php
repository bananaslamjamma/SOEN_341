<?php
 
namespace Tests\Feature;
 
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
 
class AnswerTest extends TestCase
{
    /**
     * Tests if Answer was created.
     *
     * @return void
     */
    public function AnswerTest_create()
    {
        
        $a1 = factory(Answer::class)->create([
            'q_id' => '999',  /*References the Id of previously asked question*/
            'id' => '5',
            'title' => 'test A',
            'content' => 'random answer'
        ]);     
 
        $response = $this->post('login', [
            'q_id' => '999',
            'id' => '5',
            'title' => 'test A',
            'content' => 'random answer'          
        ]);
 
        $response = $this->actingAs($Question)->get(route('forum/{this.q_id}'));
 
        $response->assertStatus(200)->assertViewIs('forum')->assertSee('Was created!');
    }
}
