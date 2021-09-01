<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipes = Equipe::all();
        $continents = Continent::all();
        return view('pages.equipes.create', compact('equipes', 'continents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $store = new Equipe;
        $store->nom = $request->nom;
        $store->ville = $request->ville;
        $store->pays = $request->pays;
        $store->joueursMax = $request->joueursMax;
        $store->continent_id = $request->continent_id;
        $store->save();
        return redirect('/equipe')->with('success', 'Une équipe a été crée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Equipe::find($id);
        $joueurs = Joueur::all();
        return view('pages.equipes.show', compact('show', 'joueurs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Equipe::find($id);
        $continents = Continent::all();
        return view('pages.equipes.edit', compact('edit', 'continents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Equipe::find($id);
        $update->nom = $request->nom;
        $update->ville = $request->ville;
        $update->pays = $request->pays;
        $update->joueursMax = $request->joueursMax;
        $update->continent_id = $request->continent_id;
        $update->save();
        return redirect('/equipe');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Equipe::find($id);
        $destroy->delete();
        return redirect('/equipe')->with('warning', 'Une équipe a été supprimé !');
    }
}
