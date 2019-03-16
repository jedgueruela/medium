<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

        @yield('embedded-style')

    </head>
    <body class="bg-grey-lightest">
        <div id="app">
            @include('layouts._partials.nav')
            <div class="container mx-auto my-8">
                <div class="flex justify-center">
                    <div class="w-4/5">
                        @if (session('successMsg'))
                            <div class="bg-green-lightest border border-green-light text-green-dark px-4 py-3 rounded relative mb-8" role="alert">
                                {{ session('successMsg') }}
                            </div>
                        @endif
                    
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/admin.js') }}"></script>
        @yield('scripts')
    </body>
</html>
