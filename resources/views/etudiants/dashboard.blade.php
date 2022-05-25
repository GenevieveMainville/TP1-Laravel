@extends('layouts.app')
@section('content')
@guest
<h1 class="p-4">@lang('lang.text_dashboard')</h1>
<hr>
<div class="list-group p-4">

  <a href="{{ route('login') }}" class="list-group-item list-group-item-action">@lang('lang.text_login')</a>
  <a href="{{ route('registration') }}" class="list-group-item list-group-item-action">@lang('lang.text_register_user')</a>
</div>
  @else  
<h1 class="p-4">{{ ucfirst(Auth::user()->name) }}</h1>
<hr>
<div class="list-group p-4">
  <a href="{{ route('etudiant.show', Auth::user()->id) }}" class="list-group-item list-group-item-action">@lang('lang.text_student_info')</a>
  <a href="{{ route('mesarticles') }}" class="list-group-item list-group-item-action">@lang('lang.text_my_articles')</a>
  <a href="{{ route('article.create') }}" class="list-group-item list-group-item-action">@lang('lang.text_create_article')</a>
  <a href="{{ route('mesdocuments') }}" class="list-group-item list-group-item-action">@lang('lang.text_my_documents')</a>
  <a href="{{ route('document.create') }}" class="list-group-item list-group-item-action">@lang('lang.text_create_document')</a>
  <a href="{{ route('logout') }}" class="list-group-item list-group-item-action">@lang('lang.text_logout')</a>
</div>

@endguest
@endsection