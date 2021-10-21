<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

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
        // find answer with correct qid
        $requestedA = Answer::where('qid', $qid )->get();

        return view('question',['question' => $requestedQ, 'answer' => $requestedA ]);
    }

// redirects to home after post request from the form
// creates a new instance of a question with infos taken from the question form
    public function storeq(){

        $question = new Question();

        $question->title = request('title');
        $question->name = Auth::user()->name;//request('name'); the name of the user will now be taken from authentification
        $question->content = request('content');

        //error_log($question); used to debug, will show the value of title,name and content in terminal

        $question-> save();

        return redirect('/forum');
    }


    public function storea($qid){
        //simple view here
        $requestedQ = Question::findorFail($qid);
        // find answer with correct qid
        $requestedA = Answer::where('qid', $qid )->get();

        //this will create an new answer, with the qid of the question
        $answer = new Answer();

        $answer->qid = $qid;
        $answer->name = Auth::user()->name;//request('name'); the name for the answer will now be taken from authentification
        $answer->content = request('content');

        //error_log($answer); used to debug, will show the answer in terminal
        $answer-> save();

        return redirect("/forum/$qid");
        //return view('question',['question' => $requestedQ, 'answer' => $requestedA ]);
        
    }

}
