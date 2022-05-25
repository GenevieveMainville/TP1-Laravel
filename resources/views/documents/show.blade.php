@extends('layouts.app')
@section('content')

@foreach($documents as $document )
<div class="card m-4">
  <div class="card-body" >
    <h4 class="card-title">{{ ucfirst($document->titre) }}</h4>
      <hr>
      <div class="card-subtitle mb-2 text-muted d-flex justify-content-between">
    <div class="fs-6"> </div>
    <div class="fs-6"> {{ date('Y/m/d', strtotime($document->created_at)) }}</div>
  </div>
    <a href="{{ route('document.edit', $document->id) }}" class="btn btn-dark card-link ">Modifier</a> 
    <button  data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-link btn btn-danger ">Supprimer</button>
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
                @lang('lang.text_delete_document')
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