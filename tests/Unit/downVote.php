<?php
 
namespace Tests\Feature;
 
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
 
class TestDownVote extends TestCase
{
    public function down_vote_delete()
    {
        $newUser = Like::create([
            'id' => '999',
            'p_id' => '999'
        ]);
        
    try {
        DB::table('likes')->where('id',999)->delete();
        $queryStatus = "Successful";
        } catch(Exception $e) {
            $queryStatus = "Not success";
        }    
    }
}
