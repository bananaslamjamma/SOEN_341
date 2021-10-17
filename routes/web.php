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



use App\Http\Controllers\ForumController;

///new route to controller
Route::get('/forum', [ForumController::class,'index']);

//question id route
Route::get('/forum/{qid}', [ForumController::class,'show']);