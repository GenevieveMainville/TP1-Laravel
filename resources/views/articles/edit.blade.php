@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 p-4">
                <h1>@lang('lang.text_modify_article')</h1>
                <hr>
                <form method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">   
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#english" type="button" role="tab" aria-controls="home" aria-selected="true">English</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#french" type="button" role="tab" aria-controls="profile" aria-selected="false">French</button>
                            </li>
                        </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="control-group col-12">    
                                        <label for="titre">@lang('lang.text_title')</label>
                                        <input type="text" id="titre" class="form-control" name="titre_en"
                                            placeholder="Entrer le titre du message" value="{{$article->titre_en}}" required>
                                            @if($errors->has('titre_en'))
                                            <span class="text-danger">{{ $errors->first('titre_en') }}</span>
                                            @endif
                                    </div>
                                    <div class="control-group col-12 mt-2">
                                        <label for="contenu">@lang('lang.text_body')</label>
                                        <textarea id="contenu" class="form-control" name="contenu_en" placeholder="@lang('lang.text_body')"
                                                rows="" required>{{$article->contenu_en}}</textarea>
                                        @if($errors->has('contenu_en'))
                                        <span class="text-danger">{{ $errors->first('contenu_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="french" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="control-group col-12">
                                        <label for="titre_fr">@lang('lang.text_title')</label>
                                        <input type="text" id="titre_fr" class="form-control" name="titre_fr"
                                            placeholder="@lang('lang.text_title')" value="{{$article->titre_fr}}" required>
                                            @if($errors->has('titre_fr'))
                                            <span class="text-danger">{{ $errors->first('titre_fr') }}</span>
                                            @endif
                                        </div>
                                    
                                    <div class="control-group col-12 mt-2">
                                        <label for="contenu_fr">@lang('lang.text_body')</label>
                                        <textarea id="contenu_fr" class="form-control" name="contenu_fr" placeholder="@lang('lang.text_body')" required>{{$article->contenu_fr}}</textarea>
                                        @if($errors->has('contenu_fr'))
                                        <span class="text-danger">{{ $errors->first('contenu_fr') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
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