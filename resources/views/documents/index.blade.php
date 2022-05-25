@extends('layouts.app')
@section('content')
<h1 class="p-4">@lang('lang.text_published')</h1>
<hr>
@forelse($documents as $document)
<div class="card" >
  <div class="card-body " >
    <h5 class="card-title">{{ ucfirst($document->titre) }}</h5>
    <div class="card-subtitle mb-2 text-muted d-flex justify-content-between">
      <div> {{ date('Y/m/d', strtotime($document->created_at)) }}</div>
    </div>
  </div> 
@empty
  <li>Aucun document</li>
@endforelse
</div>
@endsection

