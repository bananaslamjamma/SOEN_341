<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function store(Answer $answer, Request $request)
    {
        if($answer->likedBy($request->user())) {
            return response('Already liked');
        }
        
        $answer->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }

    public function destroy(Answer $answer, Request $request)
    {
        $request->user()->likes()->where('answer_id', $answer->id)->delete();
        
        return back();
    }
}
