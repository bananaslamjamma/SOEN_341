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
    }

    public function destroy(Answer $answer, Request $request)
    {
   }
}
