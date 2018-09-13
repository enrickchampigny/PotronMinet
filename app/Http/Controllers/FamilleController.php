<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Famille;
use App\User;
class FamilleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familles = Famille::latest()->orderBy('nom')->with(array('chat')) ->paginate(5);
        $id = Auth::user()->id;
        if(Auth::check()){
            if($id ==2){
            return view('familles.index',compact('familles'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
            }else{
                return view('home');
            }
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
                 return view('familles.create');
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
            'prenom' => 'required',
            'adresse',
            'cp',
            'ville',
            'telephone'
        ]);

        Famille::create($request->all());

        return redirect()->route('familles.index')
                        ->with('success','Famille created successfully');
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
            $famille = Famille::find($id);
              return view('familles.show',compact('famille'));

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

            $famille = Famille::find($id);

            if($idUser == 2 || ($famille != null && $idUser == $famille->id)){
                return view('familles.edit',compact('famille'));
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
            'prenom' => 'required',
            'adresse',
            'cp',
            'ville',
            'telephone'
        ]);

        Famille::find($id)->update($request->all());

        return redirect()->route('familles.index')
                        ->with('success','Famille updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Famille::find($id)->delete();

        return redirect()->route('familles.index')
                        ->with('success','famille deleted successfully');
    }
}
