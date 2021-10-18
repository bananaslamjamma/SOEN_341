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

        $requestedQ = Question::findorFail($qid);

        return view('question',['question' => $requestedQ]);
    }

// redirects to home after post request from the form
// creates a new instance of a question with infos taken from the question form
    public function store(){

        $question = new Question();

        
        $question->title = request('title');
        $question->name = request('name');
        $question->content = request('content');

        //error_log($question); used to debug, will show the value of title,name and content in terminal

        $question-> save();


        return redirect('/forum');
    }

}
