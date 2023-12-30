<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class EtudiantController extends Controller
{
    public function liste_etudiant()
    {
        $etudiants = Etudiant::orderBy('id', 'DESC')->paginate(3);
        return view('etudiant.liste', compact('etudiants'));
    }

    public function ajouter_etudiant()
    {
        return view('etudiant.ajouter'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);

        $etudiant = new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        $etudiant->save();
        return redirect( Route('add'))->with('status', 'L\'étudiant a été ajouté avec succès !');
    }

    public function edit_etudiant($id)
    {
        $etudiant = Etudiant::find($id);
        if($etudiant)
            return view('etudiant.edit', compact('etudiant'));
        else
            return false;
            //dd('Pas d\'etudiant');
    }

    public function update_etudiant(Request $request)
    {

        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);

        $etudiant = Etudiant::find($request->id);
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        $etudiant->update();
        return redirect( Route('liste'))->with('status', 'L\'étudiant a été modifié avec succès !');
    }

    public function delete_etudiant($id)
    {
        $etudiant = Etudiant::find($id);
        $etudiant->delete();
        return redirect( Route('liste'))->with('status', 'L\'étudiant a été supprimé avec succès !');
    }
}
