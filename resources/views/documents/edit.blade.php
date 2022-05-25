@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 p-4">
                <h1>{{ $document->titre }}</h1>
                <hr>
                <form method="POST">
                    @csrf
                    @method('PUT')
                    <div class="control-group col-12">    
                        <label for="titre">@lang('lang.text_title')</label>
                        <input type="text" id="titre" class="form-control" name="titre"
                                value="{{ $document->titre }}" required>
                    </div>
                    <div class="row mt-2 py-2">
                        <div class=" col-12">
                            <button id="btn-submit" class="btn btn-dark">
                            @lang('lang.text_modify_article')
                            </button>
                        </div>
                    </div>
                </form>      
            </div>
        </div>
    </div>
@endsection