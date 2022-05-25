@extends('layouts.app')
@section('content')
<main class="login-form">
<div class="container">
    <div class="row">
        <div class="col-12 p-4">
            <h1>@lang('lang.text_login')</h1>
            <hr>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
            @endif
            @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>                         
            @endforeach
            <form method="POST" action="{{ route('custom.login') }}">
            @csrf
                <div class="row">
                    <div class="form-group col-12 py-2">
                        <label class="col-form-label" for="email">@lang('lang.text_email')</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="@lang('lang.text_email')" value="{{old('email')}}"  required autofocus>
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
                    <div class="form-group col-12 py-2">
                        <label>
                            <input type="checkbox" name="remember"> @lang('lang.text_remember')
                        </label>
                    </div>
                </div>
                <div class="row mt-2 py-2">
                    <div class=" col-12">
                        <button type="submit" id="btn-submit" class="btn btn-dark">
                        @lang('lang.text_connection')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
 
@endsection
