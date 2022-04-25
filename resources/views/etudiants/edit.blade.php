@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <h1>Créer un nouvel étudiant</h1>
                <hr>
                    <form method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="nom">Nom</label>
                                <input type="text" id="nom" class="form-control" name="nom" placeholder="Nom" value="{{$etudiant->nom}}" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="adresse">Adresse</label>
                                <input type="text" id="adresse" class="form-control" name="adresse" placeholder="adresse" value="{{$etudiant->adresse}}" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="ville">Ville</label>
                                <select name="ville_id" id="ville">
                                @foreach($villes as $ville )
                               
                                    <option value={{$ville->id}} {{$ville->id == $ville_id->id ? "selected":"" }}>{{ ucfirst($ville->nom)}}</option>
                              @endforeach
                                </select>
                            </div>
                            <div class="control-group col-12">
                                <label for="phone">Téléphone</label>
                                <input type="text" id="phone" class="form-control" name="phone" placeholder="888-888-8888" value="{{$etudiant->phone}}" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="email">Courriel</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="email" value="{{$etudiant->email}}" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="date_naissance">Date de naissance</label>
                                <input type="text" id="date_naissance" class="form-control" name="date_naissance" placeholder="yyyy/mm/dd" value="{{$etudiant->date_naissance}}" required>
                            </div>
                            
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                   Modifier
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection