<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

        @yield('embedded-style')

    </head>
    <body class="bg-grey-lightest">
        <div id="app">
            <nav class="flex items-center justify-between flex-wrap bg-teal p-6">
                <div class="flex items-center flex-no-shrink text-white mr-6">
                    <span class="font-semibold text-xl tracking-tight">{{ config('app.name') }}</span>
                </div>
                <div class="block lg:hidden">
                    <button class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
                        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    </button>
                </div>
                <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                    <div class="text-sm lg:flex-grow">
                        <a href="{{ route('articles.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">Articles</a>
                        <form action="{{ route('logout') }}" method="post" class="block mt-4 lg:inline-block lg:mt-0 mr-4">
                            {{ csrf_field() }}
                            <button type="submit" class="text-white hover:text-white">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="container mx-auto my-8">
                <div class="flex justify-center">
                    <div class="w-4/5">
                        @if (session('successMsg'))
                            <div class="alert alert-success">
                                {{ session('successMsg') }}
                            </div>
                        @endif
                    
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
