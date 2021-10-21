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

//default routes for authentication
//i.e login, register
Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/profile', function () {
    return view('profile');
});



use App\Http\Controllers\ForumController;

///new route to controller
Route::get('/forum', [ForumController::class,'index']);

Route::post('/forum', [ForumController::class,'storeq']);

//question id route
Route::get('/forum/{qid}', [ForumController::class,'show']);

Route::post('/forum/{qid}', [ForumController::class,'storea']);