<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}}</title>
     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,700;1,300&display=swap" rel="stylesheet"/>
   
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
</head>

<header>
@php $locale = session()->get('locale'); @endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-4">
    <a class="navbar-brand text-white px-2 border d-none d-sm-block" href="{{ route('dashboard') }}">
        <h3>Collège de Maisonneuve</h3>
        <div >Forum</div>
    </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavDropdown">
      <div class="d-flex justify-content-between w-100 ">
            <div class="d-flex justify-content-between  ">
                <ul class="navbar-nav">
                @guest
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="{{ route('etudiant') }}">@lang('lang.text_student') </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="{{ route('login') }}">@lang('lang.text_login') </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="{{ route('registration') }}">@lang('lang.text_register_user') </a>
                    </li>
                    @else
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="{{ route('etudiant') }}">Etudiants </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('document') }}" class=" nav-link text-white">Documents</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('article') }}" class=" nav-link text-white">Articles</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ ucfirst(Auth::user()->name) }}
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ route('dashboard') }}" class=" dropdown-item ">@lang('lang.text_member')</a>
                            <a href="{{ route('mesarticles') }}" class=" dropdown-item ">@lang('lang.text_my_articles')</a>
                            <a href="{{ route('article.create') }}" class=" dropdown-item">@lang('lang.text_create_article')</a>
                            <a href="{{ route('mesdocuments') }}" class=" dropdown-item">@lang('lang.text_my_documents')</a>
                            <a href="{{ route('document.create') }}" class=" dropdown-item">@lang('lang.text_create_document')</a>
                            <a href="{{ route('logout') }}" class=" dropdown-item">@lang('lang.text_logout')</a>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
            <div>
                <ul class="d-flex navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link @if($locale=='en')bg-secondary text-light @endif" href="{{route('lang', 'en')}}"> EN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($locale=='fr') bg-secondary text-light @endif" href="{{route('lang', 'fr')}}">FR</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav> 
</header>

<body >
    @yield('content')
</body>


<script src="{{asset('js/bootstrap.min.js')}}"></script>
        @yield('script')

</html>