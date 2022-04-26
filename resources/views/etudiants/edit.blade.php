@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 p-4">
                <h1>Modifier un étudiant</h1>
                <hr>
                <form method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class=" col-12 py-2">
                            <label class="col-form-label" for="nom">Nom</label>
                            <input type="text" id="nom" class="form-control" name="nom" placeholder="Nom" value="{{$etudiant->nom}}" required>
                        </div>
                        <div class=" col-12 py-2">
                            <label class="col-form-label" for="adresse">Adresse</label>
                            <input type="text" id="adresse" class="form-control" name="adresse" placeholder="adresse" value="{{$etudiant->adresse}}" required>
                        </div>
                        <div class=" col-12 d-flex flex-column py-2">
                            <label class="col-form-label" for="ville">Ville</label>
                            <select name="ville_id" id="ville" class="form-control">
                            @foreach($villes as $ville )
                                <option value={{$ville->id}} {{$ville->id == $ville_id->id ? "selected":"" }}>{{ ucfirst($ville->nom)}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class=" col-12 py-2">
                            <label class="col-form-label" for="phone">Téléphone</label>
                            <input type="text" id="phone" class="form-control" name="phone" placeholder="888-888-8888" value="{{$etudiant->phone}}" required>
                        </div>
                        <div class=" col-12 py-2">
                            <label class="col-form-label" for="email">Courriel</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="email" value="{{$etudiant->email}}" required>
                        </div>
                        <div class=" col-12 py-2">
                            <label class="col-form-label"  for="date_naissance">Date de naissance</label>
                            <input type="text" id="date_naissance" class="form-control" name="date_naissance" placeholder="yyyy/mm/dd" value="{{$etudiant->date_naissance}}" required>
                        </div>
                    </div>

                    <div class="row mt-2 py-2">
                        <div class=" col-12">
                            <button id="btn-submit" class="btn btn-dark">
                                Modifier
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection