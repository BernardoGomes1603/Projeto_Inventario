<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Título da página -->
    <title>Empresa W.</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Estilos Personalizados -->
    <style>
        body {
            background-color: #f9fafb; /* Fundo claro */
            color: #000000; /* Texto preto */
        }

        .navbar {
            background-color: #007BFF; /* Azul */
        }

        .navbar-brand {
            color: #ffffff; /* Texto branco no logo */
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #ffffff; /* Texto branco nos links */
        }

        .navbar-nav .nav-link:hover {
            color: #ffd700; /* Amarelo para hover */
        }

        .btn {
            background-color: #28a745; /* Verde */
            border-color: #28a745;
        }

        .btn:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .dropdown-menu {
            background-color: #f1f1f1; /* Fundo claro */
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #dcdfe3;
        }

        .card-body {
            padding: 20px;
        }

        /* Botão de login estilizado */
        .nav-link {
            padding: 8px 15px;
            background-color: #ffffff;
            color: #007bff;
            border-radius: 50px;
            transition: background-color 0.3s;
        }

        .nav-link:hover {
            background-color: #e9f5ff;
        }

        /* Para melhorar a visibilidade do texto em branco */
        .navbar-nav .nav-link, .navbar-brand {
            color: #333333; /* Preto/escuro para garantir o contraste */
        }

        .dropdown-menu .dropdown-item {
            color: #333333; /* Texto mais escuro nos itens do menu */
        }

        .container {
            max-width: 90%; /* Para permitir mais espaço */
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Empresa W.
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
</body>
</html>
