@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 p-4">
                <h1>@lang('lang.text_register_user')</h1>
                <hr>
                <form action="{{ route('custom.registration')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12 py-2">
                            <label class="col-form-label" for="name">@lang('lang.text_name')</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="@lang('lang.text_name')" value="{{old('name')}}" required autofocus>
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        </div>
                        <div class=" col-12 py-2">
                            <label class="col-form-label" for="adresse">@lang('lang.text_address')</label>
                            <input type="text" id="adresse" class="form-control" name="adresse" placeholder="@lang('lang.text_address')" value="{{old('adresse')}}" required>
                        @if($errors->has('adresse'))
                            <span class="text-danger">{{ $errors->first('adresse') }}</span>
                        @endif
                        </div>
                        <div class=" col-12 d-flex flex-column py-2">
                            <label class="col-form-label" for="ville">@lang('lang.text_town')</label>
                            <select name="villes_id" id="villes_id" class="form-control">
                            @foreach($villes as $ville )
                                <option value={{$ville->id}}>{{ ucfirst($ville->nom)}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class=" col-12 py-2">
                            <label class="col-form-label"  for="date_naissance">@lang('lang.text_date_birth')</label>
                            <input type="text" id="date_naissance" class="form-control" name="date_naissance" placeholder="yyyy/mm/dd" value="{{old('date_naissance')}}" required>
                        @if($errors->has('date_naissance'))
                            <span class="text-danger">{{ $errors->first('date_naissance') }}</span>
                        @endif
                        </div>
                        <div class=" col-12 py-2">
                            <label class="col-form-label" for="phone">@lang('lang.text_phone')</label>
                            <input type="text" id="phone" class="form-control" name="phone" placeholder="888-888-8888" value="{{old('phone')}}" required>
                        @if($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                        </div>
                        <div class="form-group col-12 py-2">
                            <label class="col-form-label" for="email">@lang('lang.text_email')</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="@lang('lang.text_email')" value="{{old('email')}}" required autofocus>
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        </div>
                       
                        <div class="form-group col-12 py-2">
                            <label class="col-form-label" for="password">@lang('lang.text_password')</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="@lang('lang.text_password')"  required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                        </div>
                    </div>
                <div class="row mt-2 py-2">
                    <div class=" col-12">
                        <button type="submit" id="btn-submit" class="btn btn-dark">
                        @lang('lang.text_sign_up')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection