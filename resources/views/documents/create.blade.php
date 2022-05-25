@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Documents</h1>
            <hr>
            <form  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-12 py-2">
                        <label class="col-form-label" for="titre">Titre</label>
                        <input type="text" id="titre" class="form-control" name="titre" value="{{old('titre')}}" >
                    @if($errors->has('titre'))
                        <span class="text-danger">{{ $errors->first('titre') }}</span>
                    @endif
                    </div>
                    <div class="form-group col-12 py-2">
                        <label class="col-form-label" for="doc">Document</label>
                        <input type="file" id="doc" class="form-control" name="doc" value="{{old('doc')}}" >
                    @if($errors->has('doc'))
                        <span class="text-danger">{{ $errors->first('doc') }}</span>
                    @endif
                    </div>
                    
                    <div class=" col-12 py-2">
                        <label class="col-form-label"  for="langue">English</label>
                        <input type="radio" id="langue" name="langue"  value="en" >
                        <label class="col-form-label"  for="langue">Français</label>
                        <input type="radio" id="langue"  name="langue"  value="fr" >
                    @if($errors->has('langue'))
                        <span class="text-danger">{{ $errors->first('langue') }}</span>
                    @endif
                    </div>
                </div>
                <div class="row mt-2 py-2">
                    <div class=" col-12">
                        <button type="submit" id="btn-submit" class="btn btn-dark">
                        @lang('lang.text_add')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection