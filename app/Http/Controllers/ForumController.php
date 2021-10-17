<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class ForumController extends Controller
{
    // basic route of the forum, this shows all of the questions asked
    public function index(){

        $questions = Question::all();
    
        return view('forum',['questions' => $questions]);
    }


// this shows all the questions with the given id
    public function show($qid){

        $requestedQ = Question::findofFail($qid);

        return view('question',['question' => $requestedQ]);
    }

// redirects to home after post request from the form
    public function store(){

        $question = new Question();

        $question->title = request('title');
        $question->content = request('content');

        error_log($question);
        
        return redirect('/forum');
    }

}
