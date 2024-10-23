<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    {{-- CSS LINK --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app-DBEl1KqF.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1 class="h5 mb-0">{{ config('app.name') }}</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- [SOON] Search bar here. Show it when a user logs in. --}}
                    @auth
                        @if (!request()->is('admin/*'))
                            <ul class="navbar-nav ms-auto">
                                <form action="{{ route('search') }}" style="widows: 300px">
                                    <input type="search" name="search" id="search" class="form-control form-control-sm" placeholder="Search...">
                                </form>
                            </ul>
                        @endif
                    @endauth
                    <ul class="navbar-nav me-auto">

                    </ul>

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
                            {{-- Home --}}
                            <li class="nav-item" title="Home">
                                <a href="{{ route('index') }}" class="nav-link">
                                    <i class="fas fa-house text-dark icon-sm"></i>
                                </a>
                            </li>

                            {{-- Create Post --}}
                            <li class="nav-item" title="Create Post">
                                <a href="{{ route('post.create') }}" class="nav-link">
                                    <i class="fas fa-circle-plus text-dark icon-sm"></i>
                                </a>
                            </li>

                            {{-- Account --}}
                            <li class="nav-item dropdown">
                            <button id="id" class="btn shadow-none nav-link" data-bs-toggle="dropdown">
                                @if (Auth::user()->avatar)
                                    <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="rounded-circle avatar-sm">
                                @else
                                    <i class="fas fa-circle-user text-dark icon-sm"></i>
                                @endif
                            </button>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="account-dropdown">
                                    @can('admin')
                                    {{-- [SOON] Admin Controls --}}
                                    <a href="{{ route('admin.users') }}" class="dropdown-item">
                                        <i class="fas fa-user-gear"></i> Admin
                                    </a>

                                    <hr class="dropdown-divider">
                                    @endcan
                                    {{-- Profie --}}
                                    <a href="{{ route('profile.show', Auth::user()->id) }}" class="dropdown-item">
                                        <i class="fas fa-circle-user"></i> Profile
                                    </a>

                                    {{-- Logout --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-right-from-bracket"></i> {{ __('Logout') }}
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

        <main class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    {{-- [SOON] Admin Menu (col-3) --}}
                    @if (request()->is('admin/*'))
                        <div class="col-3">
                            <div class="list-group">
                                <a href="{{ route('admin.users') }}" class="list-group-item {{ request()->is('admin/users') ? 'active' : '' }}">
                                    <i class="fas fa-users"></i> Users
                                </a>
                                <a href="{{ route('admin.posts') }}" class="list-group-item {{ request()->is('admin/posts') ? 'active' : '' }}">
                                    <i class="fas fa-newspaper"></i> Posts
                                </a>
                                <a href="{{ route('admin.categories') }}" class="list-group-item {{ request()->is('admin/categories') ? 'active' : '' }}">
                                    <i class="fas fa-tags"></i> Categories
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="col-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/app-CrG75o6_.js') }}"></script>
</body>
</html>
