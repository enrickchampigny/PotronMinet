<?php

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



    Route::resource('chats','ChatController');
    Route::resource('familles','FamilleController');

    Route::get('/', function () {
      if(Auth::check()){
            $cats = DB::table('chats')->get();
            return view('home');
      }else{
        return view('auth.login');
      }

    });

    Route::get('/mycats', function () {
      if(Auth::check()){
            $id = Auth::user()->id;
            //$cats = DB::table('chats')->where('famille_id', $id)->get();
            $chats = App\Chat::where('famille_id', $id)->with(array('famille'))->get();
        //dd($chats);
            return view('chats.owncats', ['chats' => $chats]);
      }else{
        return view('auth.login');
      }

    });

    Route::get('/moncompte', function () {
      if(Auth::check()){
            $id = Auth::user()->id;
            //$cats = DB::table('chats')->where('famille_id', $id)->get();
            //$chats = App\Chat::where('famille_id', $id)->with(array('famille'))->get();
        //dd($chats);
            return view('auth.passwords.reset');
      }else{
        return view('auth.login');
      }

    });


    Auth::routes();

    if(Auth::check()){
      Route::get('/home', 'HomeController@index')->name('home');
    }else{
        Route::get('/home', 'HomeController@index')->name('home');

    }





