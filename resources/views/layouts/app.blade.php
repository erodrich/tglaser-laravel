<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

</head>
<body>

        <!-- Barra de navegacion superior -->
        @include('includes.navbar')
        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <!-- Barra lateral izquierda -->
                    @include('includes.sidebar')
                    <!-- Contenido principal -->
                    @include('includes.messages')
                    @yield('content')
                </div>
            </div>
            
        </main>
         <!-- Pie de pagina -->
         @include('includes.footer')
</body>
</html>
