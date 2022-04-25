@extends('layouts.app')
@section('content')

<div class="container-fluid ">
    <div class="row md-auto">
        <div class="col p-3">Nom</div>
        <div class="col p-3">adresse</div>
        <div class="col p-3">ville</div>
        <div class="col p-3">Téléphone</div>
        <div class="col p-3">Courriel</div>
        <div class="col p-3">Date naissance</div>
    </div>
    @forelse($etudiants as $etudiant)
    <a class="row  md-auto" href="{{ route('etudiant.show', $etudiant->id) }}">
    
        
        <div class="col p-3">{{ ucfirst($etudiant->nom)}}</div>
        <div class="col p-3">{{ ucfirst($etudiant->adresse)}}</div>
        <div class="col p-3">@foreach($villes as $ville )@if($ville->id == $etudiant->ville_id){{ ucfirst($ville->nom)}}@endif @endforeach</div>
        <div class="col p-3">{{ ucfirst($etudiant->phone)}}</div>
        <div class="col p-3">{{ ucfirst($etudiant->email)}}</div>
        <div class="col p-3">{{ ucfirst($etudiant->date_naissance)}}</div>
    </a>
    @empty
    <div>Aucun etudiant</div>
    @endforelse
</div>
@endsection