@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-md-center">Formulaire d'enregistrement des medecins</div>
                    <div class="card-body">
                        @if(isset($confirmation))
                            <div class="alert alert-success">{{$confirmation}}</div>
                        @else
                            <div class="alert alert-danger">Medecin non ajouté</div>
                        @endif
                        <form method="POST" action="{{route('persistmedecin')}}"><!-- ou utilisé action="/medecin/persist"-->
                            @csrf
                            <div class="form-group">
                                <label for="nom" class="control-label">Nom du medecin</label>
                                <input class="form-control" type="text" name="nom" id="nom" />
                            </div>
                            <div class="form-group">
                                <label for="prenom" class="control-label">Prénom du medecin</label>
                                <input class="form-control" type="text" name="prenom" id="prenom" />
                            </div>
                            <div class="form-group">
                                <label for="telephone" class="control-label">Numéro Téléphone</label>
                                <input class="form-control" type="text" name="telephone" id="telephone" />
                            </div>
                            <div class="form-group">
                                <input class="btn btn-success" type="submit" name="envoyer" id="envoyer" value="Envoyer" />
                                <input class="btn btn-danger" type="reset" name="annuler" id="annuler" value="Annuler" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
