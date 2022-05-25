@extends('layouts.app')
@section('content')
<h1 class="p-4">Articles</h1>
<hr>
@forelse($articles as $article)
<a class="card link-light"  href="{{ route('article.show', $article->id) }}">
  <div class="card-body " >
  <h5 class="card-title">{{ ucfirst($article->titre) }}</h5>
  <div class="card-subtitle mb-2 text-muted d-flex justify-content-between">
   
    <div> {{ date('Y/m/d', strtotime($article->created_at)) }}</div>
  </div>
</div>
</a>

@empty
  <li>Aucun article</li>
@endforelse

@endsection