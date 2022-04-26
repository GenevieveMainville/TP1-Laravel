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
    <nav class="nav navbar navbar-expand-lg navbar-dark bg-dark justify-content-between p-4">
    
        <a href="{{ route('etudiant') }}" class="navbar-brand text-white px-2 border">
            <h3>Collège de Maisonneuve</h3>
            <div >Réseau étudiant</div>
        </a>
        <div class="align-self-end">
            <a href="{{ route('etudiant.create') }}" class="nav-link ">Créer un étudiant</a>
        </div>
    </nav>  
</header>

<body >
    @yield('content')
</body>

<footer class="nav navbar navbar-expand-lg navbar-dark bg-dark justify-content-between p-4 text-white">
    <div>Collège de Maisonneuve</div>
</footer>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
        @yield('script')

</html>