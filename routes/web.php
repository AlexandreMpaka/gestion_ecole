<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\coursController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* Route Etudiants*/

    route::get('/liste-etudiant', [EtudiantController::class, 'liste_etudiant']);
    route::get('/details-etudiant/{id}', [EtudiantController::class, 'details_etudiant']);
    route::get('/formulaire-etudiant', [EtudiantController::class, 'formulaire_etudiant']);
    route::post('/ajouter/traitement', [EtudiantController::class, 'ajouter_etudiant_traitement']);
    route::get('/modifier-etudiant/{id}', [EtudiantController::class, 'modifier_etudiant']);
    route::post('/modifier/traitement', [EtudiantController::class, 'modifier_etudiant_traitement']);
    route::get('/delete-etudiant/{id}', [EtudiantController::class, 'supprimer_etudiant']);

    /* Route Formation*/

    route::get('/liste-formation', [FormationController::class, 'liste_formation']);
    route::get('/details-formation/{id}', [FormationController::class, 'details_formation']);
    route::get('/formulaire-formation', [FormationController::class, 'formulaire_formation']);
    route::post('/ajouterform/traitement', [FormationController::class, 'ajouter_formation_traitement']);
    route::get('/modifier-formation/{id}', [FormationController::class, 'modifier_formation']);
    route::post('/modifierForm/traitement', [FormationController::class, 'modifier_formation_traitement']);
    route::get('/delete-formation/{id}', [FormationController::class, 'supprimer_formation']);

    /* Route Cours*/

    route::get('/liste-cours', [coursController::class, 'liste_cours']);
    route::get('/details-cours/{id}', [coursController::class, 'details_cours']);
    route::get('/formulaire-cours', [coursController::class, 'formulaire_cours']);
    route::post('/ajouterCours/traitement', [coursController::class, 'ajouter_cours_traitement']);
    route::get('/modifier-cours/{id}', [coursController::class, 'modifier_cours']);
    route::post('/modifierForm/traitement', [coursController::class, 'modifier_cours_traitement']);
    route::get('/delete-cours/{id}', [coursController::class, 'supprimer_cours']);
});

require __DIR__ . '/auth.php';
