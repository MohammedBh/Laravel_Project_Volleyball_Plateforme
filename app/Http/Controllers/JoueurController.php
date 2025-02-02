<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Photo;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joueurs = Joueur::all();
        $equipes = Equipe::all();
        $roles = Role::all();
        $photos = Photo::all();
        return view('pages.joueurs.create', compact('joueurs', 'equipes', 'roles', 'photos'));
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
        request()->validate([
            'nom' => ['required', 'min:2', 'max:35'],
            'prenom' => ['required', 'min:2', 'max:35'],
            'age' => ['required', 'min:1', 'max:100'],
            'telephone' => ['required', 'min:9', 'max:20'],
            'email' => ['required', 'min:5', 'max:35'],
            'genre' => ['required'],
            'pays' => ['required', 'min:2', 'max:35'],
            'role_id' => ['required'],
            'equipe_id' => ['required'],
        ]);

        $equipe = Equipe::find($request->equipe_id);

        if ($request->equipe_id == null) {
            $photo = new Photo;
            $photo->src = $request->file("src")->hashName();
            Storage::put("public/img", $request->file("src"));
            $photo->save();

            $store = new Joueur;
            $store->nom = $request->nom;
            $store->prenom = $request->prenom;
            $store->age = $request->age;
            $store->telephone = $request->telephone;
            $store->email = $request->email;
            $store->genre = $request->genre;
            $store->role_id = $request->role_id;
            $store->equipe_id = $request->equipe_id;
            $store->photo_id = $photo->id;
            $store->save();
            return redirect('/joueur');
        } else {


            $avant = Joueur::all()->where("role_id", 1)->where("equipe_id", $equipe->id);
            $central = Joueur::all()->where("role_id", 2)->where("equipe_id", $equipe->id);
            $arriere = Joueur::all()->where("role_id", 3)->where("equipe_id", $equipe->id);


            switch ($request->role_id) {
                case 1:
                    if ($avant->count() === 2) {
                        return redirect()->back()->with("statut", "L'équipe {$equipe->nom} dispose déjà de 2 joueurs Avant");
                    }
                    break;
                case 2:
                    if ($central->count() === 2) {
                        return redirect()->back()->with("statut", "L'équipe {$equipe->nom} dispose déjà de 2 joueurs Centraux");
                    }
                    break;
                case 3:
                    if ($arriere->count() === 2) {
                        return redirect()->back()->with("statut", "L'équipe {$equipe->nom} dispose déjà de 2 joueurs Arrière");
                    }
                    break;
            }

            $photo = new Photo;
            Storage::put('public/img/', $request->file('src'));
            $photo->src = $request->file('src')->hashName();
            $photo->save();

            $store = new Joueur;
            $store->nom = $request->nom;
            $store->prenom = $request->prenom;
            $store->age = $request->age;
            $store->telephone = $request->telephone;
            $store->email = $request->email;
            $store->genre = $request->genre;
            $store->pays = $request->pays;
            $store->role_id = $request->role_id;
            $store->equipe_id = $request->equipe_id;
            $store->photo_id = $photo->id;
            $store->save();
            return redirect('/joueur')->with('success', 'Une équipe a été crée !');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Joueur::find($id);
        return view('pages.joueurs.index', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Joueur::find($id);
        $joueurs = Joueur::all();
        $equipes = Equipe::all();
        $roles = Role::all();
        $photos = Photo::all();
        return view('pages.joueurs.edit', compact('edit', 'equipes', 'roles', 'photos', 'joueurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Joueur::find($id);
        if ($request->src != null) {
            Storage::delete('public/img/' . $update->photos->src);
            Storage::put('public/img/', $request->file('src'));
            $update->photos->src = $request->file('src')->hashName();
        }
        $update->nom = $request->nom;
        $update->prenom = $request->prenom;
        $update->age = $request->age;
        $update->telephone = $request->telephone;
        $update->email = $request->email;
        $update->genre = $request->genre;
        $update->pays = $request->pays;
        $update->role_id = $request->role_id;
        $update->equipe_id = $request->equipe_id;
        $update->push();
        return redirect('/joueur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Joueur::find($id);
        $destroy->delete();
        return redirect('/joueur')->with('warning', 'Une équipe a été supprimé !');
    }
}
