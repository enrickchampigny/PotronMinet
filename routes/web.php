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

Route::get('/', function () {
  if(Auth::check()){
        $cats = DB::table('chat')->get();
        $families = DB::table('famille_accueil')->get();
        return view('home');
  }else{
    return view('auth.login');
  }

});

Route::get('/cats', function () {
  if(Auth::check()){
        $cats = DB::table('chat')->get();
        $families = DB::table('famille_accueil')->get();
        $colors = DB::table('couleur')->get();
        $catColor = DB::table('couleur_chat')->get();
        return view('lists.cats', ['cats' => json_decode($cats,true), 'families' => json_decode($families,true), 'colors' => json_decode(json_encode($colors), true), 'cat_color' => json_decode(json_encode($catColor), true)]);
  }else{
    return view('auth.login');
  }

});

Route::get('/familie/{id}', function ($id) {
  if(Auth::check()){
        $familie = DB::table('famille_accueil')->where('id', $id)->first();
        $cats = DB::table('chat')->where('id_famille', $id)->get();
        $colors = DB::table('couleur')->get();
        $catColor = DB::table('couleur_chat')->get();
        return view('familie', ['familie' => json_decode(json_encode($familie), true), 'cats' => json_decode(json_encode($cats), true), 'colors' => json_decode(json_encode($colors), true), 'cat_color' => json_decode(json_encode($catColor), true)]);
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

