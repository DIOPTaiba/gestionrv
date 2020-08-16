<?php

namespace App\Http\Controllers;

use App\Medecin;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    public function add()
    {
        return view('medecin.add');
    }
    public function getAll()
    {
        //$liste_medecins = Medecin::all();
        //Pour la pagination en Laravel
        $liste_medecins = Medecin::paginate(5);
        return view('medecin.liste', ['liste_medecins' => $liste_medecins]);
    }
    public function edit($id)
    {
        $medecin = Medecin::find($id);
        return view('medecin.edit', ['medecin' => $medecin]);
    }
    public function update(Request $request)
    {
        $medecin = Medecin::find($request->id);
        $medecin->nom = $request->nom;
        $medecin->prenom = $request->prenom;
        $medecin->telephone = $request->telephone;

        // on peut tester si l'enregistrement est ok en recupérant la valeur de retour qui est 1 ou 0 dans $result
        $result = $medecin->save();
        return redirect('/medecin/getAll');
    }
    public function delete($id)
    {
        $medecin = Medecin::find($id);
        if ($medecin != null)
        {
            $medecin->delete();
        }
        return $this->getAll();
    }
    public function persist(Request $request)
    {
        $medecin = new Medecin();
        $medecin->nom = $request->nom;
        $medecin->prenom = $request->prenom;
        $medecin->telephone = $request->telephone;

        // on peut tester si l'enregistrement est ok en recupérant la valeur de retour qui est 1 ou 0 dans $result
        $result = $medecin->save();
        if ($result)
        {
            return view('medecin.add', ['confirmation' => "Medecin bien ajouté"]);
        }
        else
        {
            echo "Problème d'insertion";
        }
        //return $this->add();
    }
}
