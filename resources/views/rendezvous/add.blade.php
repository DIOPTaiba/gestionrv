@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-md-center">Formulaire d'enregistrement des rendez-vous</div>
                    <div class="card-body">
                        @if(isset($confirmation))
                            <div class="alert alert-success">{{$confirmation}}</div>
                        @elseif(isset($erreur))
                            <div class="alert alert-danger">{{$erreur}}</div>
                        @endif
                        <form method="POST" action="{{route('persistrendezvous')}}"><!-- ou utilisé action="/medecin/persist"-->
                            @csrf
                            <div class="form-group">
                                <label for="libelle" class="control-label">Libellé du rendez-vous</label>
                                <textarea class="form-control" type="text" name="libelle" id="libelle" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="date" class="control-label">Date du rendez-vous</label>
                                <input class="form-control" type="date" name="date" id="date" />
                            </div>
                            <div class="form-group">
                                <label for="medecins_id" class="control-label">Choisissez un medecin</label>
                                <select class="form-control" name="medecins_id" id="medecins_id" >
                                    <option value="0">Faites un choix</option>
                                    @if(isset($medecins))
                                        @foreach($medecins as $medecin)
                                            <option value="{{ $medecin->id }}">{{ $medecin->prenom }} {{ $medecin->nom }}</option>
                                        @endforeach
                                    @endif
                                </select>
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

