<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="container mx-auto px-4">
            @if (session('successMsg'))
                <div class="alert alert-success">
                    {{ session('successMsg') }}
                </div>
            @endif

            @yield('content')
        </div>
        
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>