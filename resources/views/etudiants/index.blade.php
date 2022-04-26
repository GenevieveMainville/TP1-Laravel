@extends('layouts.app')
@section('content')


<div class="container-fluid ">
   <div class="col-12">
        <div class="row justify-content-md-between bg-info">
            <div class="col-md-2 p-3  ">Nom</div>
            <div class="col-md-2 p-3  d-none d-lg-block">Adresse/Téléphone</div>
            <div class="col-md-2 p-3  d-none d-md-block">Date naissance</div>
            <div class="col-md-4 p-3  d-none d-md-block">Courriel</div>
        </div>
        @forelse($etudiants as $etudiant)
        <a class="row row-col justify-content-md-between link-light tableau" href="{{ route('etudiant.show', $etudiant->id) }}">
            <div class="col-md-2 p-3 ">{{ ucfirst($etudiant->nom)}}</div>
            <div class="col-md-2 p-3  d-none d-lg-block">{{ ucfirst($etudiant->adresse)}} <br>
                @foreach($villes as $ville )@if($ville->id == $etudiant->ville_id){{ ucfirst($ville->nom)}}@endif @endforeach <br>
                {{ ucfirst($etudiant->phone)}}
            </div>
            <div class="col-md-2 p-3  d-none d-md-block">{{ ucfirst($etudiant->date_naissance)}}</div>
            <div class="col-md-4 p-3  d-none d-md-block">{{ ucfirst($etudiant->email)}}</div>
        </a>
        @empty
        <div>Aucun etudiant</div>
        @endforelse
        
    </div> 
</div>
@endsection