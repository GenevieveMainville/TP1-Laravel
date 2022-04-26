@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 p-4">            
                <h1>Informations de l'étudiant</h1>
                <hr>
                <div class="col py-3"><span class="font-weight-bold">Nom:</span> {{ ucfirst($etudiant->nom) }}</div>
                <div class="col py-3"><span class="font-weight-bold">Adresse:</span> {{ ucfirst($etudiant->adresse) }}</div>
                <div class="col py-3"><span class="font-weight-bold">Ville:</span> {{ ucfirst($ville->nom)}}</div>
                <div class="col py-3"><span class="font-weight-bold">Téléphone:</span> {{ ucfirst($etudiant->phone) }}</div>
                <div class="col py-3"><span class="font-weight-bold">Courriel:</span> {{ ucfirst($etudiant->email) }}</div>
                <div class="col py-3"><span class="font-weight-bold">Date de naissance:</span> {{ ucfirst($etudiant->date_naissance) }}</div>
                {!! $etudiant->body !!}
            </div>
        </div>
    </div>
    
    <div class="p-3 d-flex">
        <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-dark ">Modifier</a>  
        <div class="px-2">
            <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#exampleModal">Supprimer</button>
        </div>
    </div>

    <!--MODAL-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Supprimer l'étudiant {{ ucfirst($etudiant->nom) }}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <form method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @endsection