@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">  
                             
                <h1>Informations de l'étudiant</h1>
                <hr>
                <div class="col p-3">{{ ucfirst($etudiant->nom) }}</div>
                <div class="col p-3">{{ ucfirst($etudiant->adresse) }}</div>
                <div class="col p-3">{{ ucfirst($ville->nom)}}</div>
                <div class="col p-3">{{ ucfirst($etudiant->phone) }}</div>
                <div class="col p-3">{{ ucfirst($etudiant->email) }}</div>
                <div class="col p-3">{{ ucfirst($etudiant->date_naissance) }}</div>
                
                {!! $etudiant->body !!}
                
            </div>
        </div>
    </div>
    <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-outline-primary btn-sm">Modifier</a>  
    <a href="{{ route('etudiant') }}" class="btn btn-outline-primary btn-sm">Supprimer</a>
    <form method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Supprimer</button>
        </form>
    @endsection