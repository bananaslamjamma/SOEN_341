<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class QuestionTest extends TestCase
{
    /**
     * Tests if Question was created.
     *
     * @return void
     */
    public function QuestionTest_create()
    {
        
        $q1 = factory(Question::class)->create([
            'p_id' => '999',
            'id' => '999',
            'title' => 'test Q',
            'content' => 'same stuff'
        ]);     
 
        $response = $this->post('login', [
            'p_id' => '999',
            'id' => '999',
            'title' => 'test Q',
            'content' => 'same stuff'          
        ]);
 
        $response = $this->actingAs($Question)->get(route('forum/{this.p_id}'));
 
        $response->assertStatus(200)->assertViewIs('forum')->assertSee('Was created!');
    }
}

