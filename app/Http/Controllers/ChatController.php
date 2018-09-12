<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Chat;

class ChatController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats = Chat::latest()->paginate(5);
        if(Auth::check()){
        return view('chats.index',compact('chats'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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

        $chats = App\Famille::find(1);
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
        return view('chats.create');
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

        Chat::create($request->all());

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
        $chat = Chat::find($id);
        return view('chats.show',compact('chat'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chat = Chat::find($id);
        return view('chats.edit',compact('chat'));
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
