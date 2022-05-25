@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 p-4">
                <h1>@lang('lang.text_modify_information')</h1>
                <hr>
                <form method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class=" col-12 py-2">
                            <label class="col-form-label" for="name">@lang('lang.text_name')</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="@lang('lang.text_name')" value="{{ ucfirst($user->name) }}" required>
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class=" col-12 py-2">
                            <label class="col-form-label" for="adresse">@lang('lang.text_address')</label>
                            <input type="text" id="adresse" class="form-control" name="adresse" placeholder="@lang('lang.text_address')" value="{{$etudiant->adresse}}" required>
                            @if($errors->has('adresse'))
                            <span class="text-danger">{{ $errors->first('adresse') }}</span>
                            @endif
                        </div>
                        <div class=" col-12 d-flex flex-column py-2">
                            <label class="col-form-label" for="ville">@lang('lang.text_town')</label>
                            <select name="villes_id" id="ville" class="form-control">
                            @foreach($villes as $ville )
                                <option value={{$ville->id}} {{$ville->id == $ville_id->id ? "selected":"" }}>{{ ucfirst($ville->nom)}}</option>
                            @endforeach
                            </select>
                            @if($errors->has('villes_id'))
                            <span class="text-danger">{{ $errors->first('villes_id') }}</span>
                            @endif
                        </div>
                        <div class=" col-12 py-2">
                            <label class="col-form-label" for="phone">@lang('lang.text_phone')</label>
                            <input type="text" id="phone" class="form-control" name="phone" placeholder="888-888-8888" value="{{$etudiant->phone}}" required>
                            @if($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class=" col-12 py-2">
                            <label class="col-form-label" for="email">@lang('lang.text_email')</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="email" value="{{$etudiant->email}}" required>
                            @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class=" col-12 py-2">
                            <label class="col-form-label"  for="date_naissance">@lang('lang.text_date_birth')</label>
                            <input type="text" id="date_naissance" class="form-control" name="date_naissance" placeholder="yyyy/mm/dd" value="{{$etudiant->date_naissance}}" required>
                            @if($errors->has('date_naissance'))
                            <span class="text-danger">{{ $errors->first('date_naissance') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row mt-2 py-2">
                        <div class=" col-12">
                            <button id="btn-submit" class="btn btn-dark">
                            @lang('lang.text_update')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection