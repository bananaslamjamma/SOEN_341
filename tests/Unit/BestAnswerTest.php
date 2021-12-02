<?php
 
namespace Tests\Feature;
 
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
 
class BestanswerTest extends TestCase
{
    /**
     * Tests if an Answer can be locked in as best answer
     * create a instance of Best Answer
     * @return void
     */
    public function BestAnswerTest_create()
    {
        
        $ba1 = factory(Bestanswer::class)->create([
            'q_id' => '999',  /*References the Id of previously asked Question*/
            'aid' => '5', /*References the Id of the chosen Answer*/
            'name' => 'John',
            'content' => 'random answer'
        ]);     
 
        $response = $this->post('login', [
            'q_id' => '999',
            'aid' => '5',
            'name' => 'John',
            'content' => 'random answer'          
        ]);
 
        $response = $this->actingAs($Question)->get(route('forum/{this.q_id}'));
 
        $response->assertStatus(200)->assertViewIs('forum')->assertSee('Was created!');
    }
}
