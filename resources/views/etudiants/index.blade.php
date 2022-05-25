@extends('layouts.app')
@section('content')



<div class="container-fluid ">
   <div class="col-12">
        <div class="row justify-content-md-between bg-info">
            <div class="col-md-2 p-3  ">@lang('lang.text_name')</div>
            <div class="col-md-2 p-3  d-none d-lg-block">@lang('lang.text_address')/@lang('lang.text_phone')</div>
            <div class="col-md-2 p-3  d-none d-md-block">@lang('lang.text_date_birth')</div>
            <div class="col-md-4 p-3  d-none d-md-block">@lang('lang.text_email')</div>
        </div>
        @forelse($etudiants as $etudiant)
        <a class="row row-col justify-content-md-between link-light tableau" href="{{ route('etudiant.show', $etudiant->id) }}">
            <div class="col-md-2 p-3 "> @foreach($users as $user )
                @if($user->id == $etudiant->id){{ ucfirst($user->name)}}@endif @endforeach</div>
            <div class="col-md-2 p-3  d-none d-lg-block">{{ ucfirst($etudiant->adresse)}} <br>
                @foreach($villes as $ville )
                @if($ville->id == $etudiant->villes_id){{ ucfirst($ville->nom)}}@endif @endforeach <br>
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
