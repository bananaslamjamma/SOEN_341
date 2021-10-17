<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/login', function () {
    return view('account');
});

Route::get('/forum', function () {

    $questions = [
        ['id'=>'4540', 'name'=> 'rango', 'title'=>'question test', 'content'=>'blablabla'],
        ['id'=>'345435', 'name'=> 'isafame', 'title'=>'question test gregre', 'content'=>'blablabla'],
        ['id'=>'4540', 'name'=> 'darwin', 'title'=>'fians', 'content'=>'blablabla']
    ];

    return view('forum',['questions' => $questions]);
});

//question id route
Route::get('/forum/{qid}', function ($qid) {

    return view('question',['qid' => $qid]);
});