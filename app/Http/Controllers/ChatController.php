<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\Chat;
use App\Photo;

class ChatController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$chats = App\Chat::where('famille_id', $id)->with(array('famille'))->get();
        $chats = Chat::with(array('famille'))->orderBy('nom', 'asc')->get();
        //dd($chats);
        $id = Auth::user()->id;
        if(Auth::check()){
            if($id ==2){
            return view('chats.index',compact('chats'));
            }else{
                return view('home');
            }
        }else{
            return view('auth.login');
        }
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function owncats()
    {
        $id = Auth::user()->id;
        $chats = App\Chat::where('famille_id', $id)->with(array('familles'));
        dd($chats);
        if(Auth::check()){
            return view('chats.owncats',compact('chats'));
        }else{
            return view('auth.login');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;

         if(Auth::check()){
            if($id ==2){
                 return view('chats.create');
            }else{
                return view('home');
            }
        }else{
            return view('auth.login');
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nom' => 'required',
            'ancien_nom',
            'couleur',
            'date_naissance',
            'numero_puce',
            'resume'
        ]);



        $id = Chat::create($request->all());
        //dd($request);
        $photoName = time().'.'.$request->user_photo->getClientOriginalExtension();
        $photo = new Photo;
        $photo->chemin = '/img/'.$photoName;
        $photo->chat_id = intval($id->id);
        $photo->save();
                  /*
          talk the select file and move it public directory and make avatars
          folder if doesn't exsit then give it that unique name.
          */

        $request->user_photo->move(public_path('img'), $photoName);

        return redirect()->route('chats.index')
                        ->with('success','Chat created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(Auth::check()){
            $chat = Chat::find($id);
              return view('chats.show',compact('chat'));

        }else{
            return view('auth.login');
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idUser = Auth::user()->id;

        if(Auth::check()){

            $chat = Chat::find($id);

            if($idUser == 2 || ($chat != null && $idUser == $chat->famille_id)){
                return view('chats.edit',compact('chat'));
            }else{
                return view('home');
            }
        }else{
            return view('auth.login');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'nom' => 'required',
            'ancien_nom',
            'couleur',
            'date_naissance',
            'numero_puce',
            'resume'
        ]);

        Chat::find($id)->update($request->all());
        $inputs = Input::all();
        /*dd($inputs);
        dd($request);*/
        //dd($inputs['user_photo']);
        foreach ($inputs['user_photo'] as $f) {
            $photoName = time().'.'.$f->getClientOriginalExtension();
            $photo = new Photo;
            $photo->chemin = '/img/'.$photoName;
            $photo->chat_id = intval($id);
            $photo->save();
            $f->move(public_path('img'), $photoName);
        }


        return redirect()->route('chats.index')
                        ->with('success','Chat updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chat::find($id)->delete();

        return redirect()->route('chats.index')
                        ->with('success','chat deleted successfully');
    }
}
