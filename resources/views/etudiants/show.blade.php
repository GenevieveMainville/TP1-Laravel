@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 p-4">            
                <h1>@lang('lang.text_student_info')</h1>
                <hr>
                <div class="col py-3"><span class="font-weight-bold">@lang('lang.text_name'):</span> {{ ucfirst($user->name) }}</div>
                <div class="col py-3"><span class="font-weight-bold">@lang('lang.text_address'):</span> {{ ucfirst($etudiant->adresse) }}</div>
                <div class="col py-3"><span class="font-weight-bold">@lang('lang.text_town'):</span> {{ ucfirst($ville->nom)}}</div>
                <div class="col py-3"><span class="font-weight-bold">@lang('lang.text_phone'):</span> {{ ucfirst($etudiant->phone) }}</div>
                <div class="col py-3"><span class="font-weight-bold">@lang('lang.text_email'):</span> {{ ucfirst($etudiant->email) }}</div>
                <div class="col py-3"><span class="font-weight-bold">@lang('lang.text_date_birth'):</span> {{ ucfirst($etudiant->date_naissance) }}</div>
                {!! $etudiant->body !!}
            </div>
        </div>
    </div>

    @if($user->id === Auth::user()->id)
    <div class="p-3 d-flex">
        <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-dark ">@lang('lang.text_update')</a>    
    </div>
    @endif
   
 
    @endsection