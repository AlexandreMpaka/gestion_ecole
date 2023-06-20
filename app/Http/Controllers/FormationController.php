<?php

namespace App\Http\Controllers;


use App\Models\formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    public function liste_formation()
    {
        $formations = formation::all();
        return view('formation.listeformation', compact('formations'));
    }

    public function details_formation($id)
    {

        $formations = formation::where('id', $id)->first();
        $cours = $formations->cours;
        return view('formation.detailsformation', compact('formations'));
    }

    public function formulaire_formation()
    {
        return view('formation.formulaireformation');
    }



    public function ajouter_formation_traitement(Request $request)
    {
        $request->validate([
            'nomForm' => 'required',
            'description' => 'required',
        ]);

        $formation = new formation();
        $formation->nomForm = $request->nomForm;
        $formation->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $formation->image = $imagePath;
        }


        $formation->save();

        return redirect('/formulaire-formation')->with('status', 'La formation a bien été ajouté avec succes');
    }


    public function modifier_formation($id)
    {
        $formations = formation::find($id);
        return view('formation.modifier', compact('formations'));
    }

    public function modifier_formation_traitement(Request $request)
    {
        $request->validate([
            'nomForm' => 'required',
            'description' => 'required',
        ]);
        $formation = formation::find($request->id);
        $formation->nomForm = $request->nomForm;
        $formation->description = $request->description;
        $formation->update();
        return redirect('/liste-formation')->with('status', 'La formation a bien été modifié avec succes');
    }

    public function supprimer_formation($id)
    {
        $formations = formation::find($id);
        $formations->delete();
        return redirect('/liste-formation')->with('status', 'La formation a bien été supprimé avec succes');
    }

    public function show($id)
    {
        $formation = formation::findOrFail($id);
        $cours = $formation->nouvelleTable;

        return view('formation.formulaireformation', compact('formation', 'nouvelleTable'));
    }
}
