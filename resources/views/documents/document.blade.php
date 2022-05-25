@extends('layouts.app')
@section('content')
<h1 class="p-4">@lang('lang.text_my_documents')</h1>
<hr>
@forelse($documents as $document )
<a class="card link-light m-4" href="{{ route('document.show', $document->id) }}">
  <div class="card-body" >
    <h4 class="card-title">{{ ucfirst($document->titre) }}</h4>
    <hr>
    <div class="card-subtitle mb-2 text-muted d-flex justify-content-between">
      <div class="fs-6"> {{ date('Y/m/d', strtotime($document->created_at)) }}</div>
    </div>
  </div>
</a>
@empty
<li class="p-4 ">Aucun document</li>
@endforelse




@endsection