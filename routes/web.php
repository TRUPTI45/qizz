<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\quiz;
use App\Http\Controllers\user;

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
    return view('login');
    route::view('/login','login');
    route::post('/quizz',[quiz::class,'quizz']);
    route::get('/next/{question_id}',[quiz::class,'quizz']);
    route::get('/save',[quiz::class,'save']);
    route::post('mail',[user::class,'mail']);
    route::get('/test_result',[user::class,'result'])->name('test_result1');
});
