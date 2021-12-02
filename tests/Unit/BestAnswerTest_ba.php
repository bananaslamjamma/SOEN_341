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
        
    /*Only difference is here*/
     if (Bestanswer::where('qid', $qid )->exists()) {
 
            Bestanswer::where('qid', $qid)->delete();
        }
    
        $ba1 = factory(Bestanswer::class)->create([
            'q_id' => '230',  /*References the Id of previously asked Question*/
            'aid' => '65', /*References the Id of the chosen Answer*/
            'name' => 'Arty',
            'content' => 'other random answer'
        ]);     
 
        $response = $this->post('login', [
            'q_id' => '230',
            'id' => '65',
            'name' => 'Arty',
            'content' => 'other random answer'          
        ]);
 
        $response = $this->actingAs($Question)->get(route('forum/{this.q_id}'));
 
        $response->assertStatus(200)->assertViewIs('forum')->assertSee('Was created!');
    }
}
 
