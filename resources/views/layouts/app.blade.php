<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield("meta")

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public.css') }}" rel="stylesheet">
</head>
<body>
    <div>
        <nav class="navbar navbar-dark navbar-expand-md shadow-sm main-bg-color">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @php
                            $routeName = \Request::route()->getName();
                        @endphp
                        <li class="nav-item @if($routeName === 'public.posts') active @endif ">
                            <a class="nav-link" href="{{ route('public.posts') }}">{{ __('Blog') }}</a>
                        </li>
                        <li class="nav-item @if($routeName === 'public.projects') active @endif ">
                            <a class="nav-link" href="{{ route('public.projects') }}">{{ __('Projects') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <div class="back-to-top">
            <span>^</span>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.back-to-top').on('click', function (event) {
                event.preventDefault();
                $("html, body").animate({scrollTop: 0}, 500);
            });

            $(window).scroll(function () {
                var scrollTop = $(document).scrollTop();

                if (scrollTop > 500) {
                    $('.back-to-top').addClass('active');
                } else {
                    $('.back-to-top').removeClass('active');
                }
            })
        });
    </script>
</body>
</html>
