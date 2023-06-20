<?php

namespace App\Http\Controllers;

use App\Models\cours;
use App\Models\etudiants;
use App\Models\formation;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function liste_cours()
    {

        $cours = Cours::with('formation')->get();
        $cours = Cours::with('etudiant')->get();

        return view('cours.listecours', compact('cours'));
    }

    public function details_cours($id)
    {

        $cours = Cours::with('formation')->find('id');
        $cours = Cours::with('etudiant')->find('id');

        return view('cours.detailscours', compact('cours'));
    }

    public function formulaire_cours()
    {
        $formations = formation::pluck('nomForm', 'id');
        $etudiant = etudiants::pluck('nom', 'id');

        return view('cours.formulairecours', compact('formations'), compact('etudiant'));
    }



    public function ajouter_cours_traitement(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'id_formations' => 'required',
            'id_etudiants' => 'required',
        ]);

        $cours = new cours();
        $cours->id = $request->id;
        $cours->id_formations = $request->id_formations;
        $cours->id_etudiants = $request->id_etudiants;
        $cours->save();

        return redirect('/formulaire-cours')->with('status', 'Le cours a bien été ajouté avec succes');
    }

    public function modifier_cours($id)
    {
        $cours = cours::find($id);
        return view('cours.modifier', compact('cours'));
    }

    public function modifier_cours_traitement(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'id_formations' => 'required',
            'id_etudiants' => 'required',
        ]);
        $cours = cours::find($request->id);
        $cours->id = $request->id;
        $cours->id_formations = $request->id_formations;
        $cours->id_etudiants = $request->id_etudiants;
        $cours->update();
        return redirect('/liste-cours')->with('status', 'Le cours a bien été modifié avec succes');
    }

    public function supprimer_cours($id)
    {
        $cours = cours::find($id);
        $cours->delete();
        return redirect('/liste-cours')->with('status', 'Le cours a bien été supprimé avec succes');
    }
}
