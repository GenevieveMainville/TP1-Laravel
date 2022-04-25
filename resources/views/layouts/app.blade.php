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
    <h1>Réseau étudiant du Collège de Maisonneuve</h1>
</header>
<body>
    @yield('content')
</body>
<footer>

</footer>
<script src="{{asset('js/scripts.js')}}"></script>
        @yield('script')

</html>