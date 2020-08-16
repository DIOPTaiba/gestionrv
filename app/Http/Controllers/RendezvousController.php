<?php

namespace App\Http\Controllers;

use App\Medecin;
use App\Rendezvous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RendezvousController extends Controller
{
    //gestion des connexions déconnexion
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add()
    {
        $medecins = Medecin::all();
        return view('rendezvous.add', ['medecins' => $medecins]);
    }
    public function getAll()
    {
        //Pour la pagination en Laravel
        //$liste_rendezvous = Rendezvous::paginate(5);
        $liste_rendezvous = Rendezvous::all();
        return view('rendezvous.liste', ['liste_rendezvous' => $liste_rendezvous]);
    }
    public function edit($id)
    {
        $rendezvous = Rendezvous::find($id);
        return view('rendezvous.edit', ['rendezvous' => $rendezvous]);
    }
    public function update(Request $request)
    {
        $rendezvous = Rendezvous::find($request->id);
        $rendezvous->libelle = $request->libelle;
        $rendezvous->date = $request->date;
        $rendezvous->medecins_id = $request->medecins_id;
        $rendezvous->user_id = Auth::id();

        // on peut tester si l'enregistrement est ok en recupérant la valeur de retour qui est 1 ou 0 dans $result
        $result = $rendezvous->save();
        return redirect('/rendezvous/getAll');
    }
    public function delete($id)
    {
        $rendezvous = Rendezvous::find($id);
        if ($rendezvous != null)
        {
            $rendezvous->delete();
        }
        return redirect('/rendezvous/getAll');
    }
    public function persist(Request $request)
    {
        $rendezvous = new Rendezvous();
        $rendezvous->libelle = $request->libelle;
        $rendezvous->date = $request->date;
        $rendezvous->medecins_id = $request->medecins_id;
        $rendezvous->user_id = Auth::id();

        // on peut tester si l'enregistrement est ok en recupérant la valeur de retour qui est 1 ou 0 dans $result
        $result = $rendezvous->save();
        if ($result)
        {
            return view('rendezvous.add', ['confirmation' => "Rendez-vous bien ajouté"]);
        }
        else
        {
            return view('rendezvous.add', ['erreur' => "Rendez-vous non ajouté"]);
        }
        //return $this->add();
    }
}
