<?php

use App\Events\MessagePosted;

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
    return view('chat');
})->middleware('auth');

Route::get('/messages', function() {
    return App\Message::with('user')->get();
})->middleware('auth');

Route::post('/messages', function() {
    $user = Auth::user();
    
    $message = request()->get('message');
    
    $message = $user->messages()->create([
         'message' => $message
    ]);
    
    //Announce about new messages
    event(new MessagePosted($message, $user));
    
    return response(['status' => 'OK']);
    
})->middleware('auth');;

//Route::get('/chat', function() {
//    return view('chat');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
