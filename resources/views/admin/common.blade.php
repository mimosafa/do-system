<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- inline styles by mimoto -->
    <style>
        th.imagesTh {
            width: 100px;
        }
        @media (min-width: 768px) {
            th.imagesTh {
                width: 150px;
            }
        }
        .noImage {
            display: block;
            height: 60px;
            width: 80px;
            background: #ccc;
            text-align: center;
            color: #fff;
            font-weight: 400;
            line-height: 60px;
        }
        @media (min-width: 768px) {
            .noImage {
                height: 90px;
                width: 120px;
                font-weight: 700;
                line-height: 90px;
            }
        }
        .thumbImage {
            display: block;
            height: 60px;
            width: 80px;
            overflow: hidden;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        @media (min-width: 768px) {
            .thumbImage {
                height: 90px;
                width: 120px;
            }
            .thumbImage:hover {
                background-size: contain;
                background-color: #ddd;
            }
        }
        .table-status-prospective, .table-status-prospective>td, .table-status-prospective>th,
        .table-status-unregistered, .table-status-unregistered>td, .table-status-unregistered>th,
        .table-status-pending, .table-status-pending>td, .table-status-pending>th {
            background-color: #c3e6cb;
        }
        .table-status-prospective, .table-status-prospective>td, .table-status-prospective>th {
            opacity: .65;
        }
        .table-status-unregistered, .table-status-unregistered>td, .table-status-unregistered>th {
            opacity: .85;
        }
        .table-status-suspended, .table-status-suspended>td, .table-status-suspended>th,
        .table-status-deregistered, .table-status-deregistered>td, .table-status-deregistered>th,
        .table-status-unrelated, .table-status-unrelated>td, .table-status-unrelated>th {
            background-color: #d6d8db;
        }
        .table-status-deregistered, .table-status-deregistered>td, .table-status-deregistered>th {
            opacity: .85;
        }
        .table-status-unrelated, .table-status-unrelated>td, .table-status-unrelated>th {
            opacity: .65;
        }
    </style>
</head>
<body class="pt-5">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.kitchencars.index') }}">出店者リスト</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdownLists" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    全リスト <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLists">
                                    <a class="dropdown-item" href="{{ route('admin.vendors.index') }}">事業者</a>
                                    <a class="dropdown-item" href="{{ route('admin.cars.index') }}">車両</a>
                                    <a class="dropdown-item" href="{{ route('admin.shops.index') }}">店舗</a>
                                    <a class="dropdown-item" href="{{ route('admin.genres.index') }}">ジャンル</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('hidden_content')

        <main class="py-4">
            <div class="container">
                @include('admin.includes.errors')

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
