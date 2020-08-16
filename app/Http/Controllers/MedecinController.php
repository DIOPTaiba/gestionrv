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
        $liste_medecins = Medecin::all();
        return view('medecin.liste', ['liste_medecins' => $liste_medecins]);
    }
    public function edit($id)
    {
        return $this->getAll();
        //return view('medecin.edit');
    }
    public function update()
    {
        return $this->getAll();
    }
    public function delete($id)
    {
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
