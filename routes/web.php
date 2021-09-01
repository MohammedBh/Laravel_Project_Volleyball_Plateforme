<?php

use App\Http\Controllers\ContinentController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\JoueurController;
use App\Models\Continent;
use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Photo;
use App\Models\Role;
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
// INDEX -> HOME
Route::get('/', function () {
    return view('welcome');
});

// INDEX & SHOW -> TEAMS
Route::get('/allequipes', function () {
    $allequipes = Equipe::all();
    return view('pages.equipes.index', compact('allequipes'));
});

Route::get('/joueur/{id}/show', function ($id) {
    $joueurs = Joueur::find($id);
    return view('pages.equipes.joueursShow.show', compact('joueurs'));
});

Route::get('/allequipe/{id}/show', [EquipeController::class, 'show']);

// INDEX & SHOW -> PLAYERS
Route::get('/alljoueurs', function () {
    $alljoueurs = Joueur::all();
    return view('pages.joueurs.index', compact('alljoueurs'));
});

Route::get('/joueur/{id}/show', function ($id) {
    $joueurs = Joueur::find($id);
    return view('pages.joueurs.joueursShow.show', compact('joueurs'));
});

// RESOURCES -> EQUIPE, CONTINENT, JOUEUR
Route::resource('equipe', EquipeController::class);
Route::resource('continent', ContinentController::class);
Route::resource('joueur', JoueurController::class);
