<?php

namespace App\Http\Controllers;

use App\Models\etudiants;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function liste_etudiant()
    {
        $etudiants = Etudiants::all();
        return view('Etudiant.listeetudiant', compact('etudiants'));
    }

    public function details_etudiant($id)
    {

        $etudiants = etudiants::where('id', $id)->first();
        $cours = $etudiants->cours;
        return view('etudiant.detailsetudiant', compact('etudiants'));
    }

    public function formulaire_etudiant()
    {
        return view('Etudiant.formulaireetudiant');
    }



    public function ajouter_etudiant_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
        ]);

        $etudiant = new etudiants();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->adresse = $request->adresse;
        $etudiant->telephone = $request->telephone;
        $etudiant->save();

        return redirect('/formulaire-etudiant')->with('status', 'L\'étudiant a bien été ajouté avec succes');
    }

    public function modifier_etudiant($id)
    {
        $etudiants = Etudiants::find($id);
        return view('Etudiant.modifier', compact('etudiants'));
    }

    public function modifier_etudiant_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
        ]);
        $etudiant = Etudiants::find($request->id);
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->adresse = $request->adresse;
        $etudiant->telephone = $request->telephone;
        $etudiant->update();
        return redirect('/liste-etudiant')->with('status', 'L\'étudiant a bien été modifié avec succes');
    }

    public function supprimer_etudiant($id)
    {
        $etudiants = Etudiants::find($id);
        $etudiants->delete();
        return redirect('/liste-etudiant')->with('status', 'L\'étudiant a bien été supprimé avec succes');
    }

    public function show($id)
    {
        $etudiants = etudiants::findOrFail($id);
        $cours = $etudiants->cours;

        return view('etudiants.show', compact('etudiants', 'cours'));
    }
}
