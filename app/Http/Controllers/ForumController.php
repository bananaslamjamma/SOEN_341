<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class ForumController extends Controller
{
    public function index(){

        $questions = Question::all();
    
        return view('forum',['questions' => $questions]);
    }



    public function show($qid){

        $requestedQ = Question::find($qid);

        return view('question',['question' => $requestedQ]);
    }

}
