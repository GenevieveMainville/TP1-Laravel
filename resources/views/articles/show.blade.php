@extends('layouts.app')
@section('content')

@foreach($articles as $article )
<div class="card m-4">
  <div class="card-body" >
  <h4 class="card-title">{{ ucfirst($article->titre) }}</h4>
  <hr>
  <div class="card-subtitle mb-2 text-muted d-flex justify-content-between">
    <div class="fs-6"> {{$article->articleHasUser->name}}</div>
    <div class="fs-6"> {{ date('Y/m/d', strtotime($article->created_at)) }}</div>
  </div>
  <p class="card-text  mt-4 mb-5">{!! $article->contenu !!}</p>
  @if($article->articleHasUser->id === Auth::user()->id)
    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-dark card-link ">@lang('lang.text_modify_article')</a> 
    <button  data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-link btn btn-danger ">@lang('lang.text_delete')</button>
    @endif
    <a href="{{ route('article.pdf', $article->id)}}" class="btn btn-outline-success" target="_blank">Download</a>
  </div>
</div>
</div>
@endforeach
    <!--MODAL-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('lang.text_delete')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                @lang('lang.text_delete_article')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.text_close')</button>
                    <form method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">@lang('lang.text_delete')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection