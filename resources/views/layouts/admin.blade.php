<?php
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
    $projects = Project::all();
    $types = Type::all();
    $technologies = Technology::all();

    function giveActive($route,) {
        if($route == URL::full()) {
            return 'active';
        }
    }
?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- font per il banner scuro --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">

    {{-- cdn animazioni --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div class="logo_laravel">

                    </div>
                    {{-- config('app.name', 'Laravel') --}}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/') }}">{{ __('Home') }}</a>
                        </li>
                    </ul>

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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a>
                                <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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


    </div>
    
    <main>
        <div class="aside d-flex gap-3 mt-5">
            <aside class="ms-3 col-2 ">
                <div class="aside-title">Navigazione</div>
                <div class="inner-aside container">
                    <div class="list-group">

                        <div class="list-group my-2">
                            <a href="{{route('admin.dashboard') }}" class="list-group-item list-group-item-action {{giveActive(route('admin.dashboard') )}}" aria-current="true">{{ __('Home') }}</a>
                        </div>


                        <strong class="my-2">Sezione Pogetti</strong>
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action {{giveActive(route('admin.projects.create'))}}" href="{{route('admin.projects.create') }}"><i class="fa-solid fa-plus"></i> {{ __('Crea un nuovo') }}</a>
                            <a class="list-group-item list-group-item-action {{giveActive(route('admin.projects.index'))}} " href="{{route('admin.projects.index') }}">{{ __('Lista Progetti') }}  ({{count($projects)}})</a>
                        </div>
                        <ul>
                            @foreach($projects as $project)
                            <li class="list-group">
                                <a class="list-group-item list-group-item-action {{giveActive(route('admin.projects.show', $project))}}" href="{{ route('admin.projects.show', $project) }}">{{$project->title}}</a>
                                
                            </li>
                            @endforeach
                        </ul>

                        <strong class="my-2">Sezione tipologia</strong>
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action {{giveActive(route('admin.types.create'))}}" href="{{route('admin.types.create') }}"><i class="fa-solid fa-plus"></i> {{ __('Crea nuova tipologia') }}</a>
                            <a class="list-group-item list-group-item-action {{giveActive(route('admin.types.index'))}}" href="{{ route('admin.types.index') }}">{{__('Lista tipologie')}} ({{count($types)}})</a>
                        </div>
                        <ul>
                            @foreach($types as $type)
                            <li class="nav-link">
                                <a class="list-group-item list-group-item-action {{giveActive(route('admin.types.show', $type))}}" href="{{ route('admin.types.show', $type) }}">{{$type->name}}</a>
                            </li>
                            @endforeach
                        </ul>  
                        
                        <strong class="my-2">Sezione tecnologia</strong>
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action {{giveActive(route('admin.technologies.create'))}}" href="{{route('admin.technologies.create') }}"><i class="fa-solid fa-plus"></i> {{ __('Crea nuova tecnologia') }}</a>
                            <a class="list-group-item list-group-item-action {{giveActive(route('admin.technologies.index'))}}" href="{{ route('admin.technologies.index') }}">{{__('Lista tecnologie')}} ({{count($technologies)}})</a>
                        </div>
                        <ul>
                            @foreach($technologies as $technology)
                            <li class="nav-link">
                                <a class="list-group-item list-group-item-action {{giveActive(route('admin.technologies.show', $technology))}}" href="{{ route('admin.technologies.show', $technology) }}">{{$technology->name}}</a>
                            </li>
                            @endforeach
                        </ul>  


                      </div>
                </div>       
            </aside>

            <div class="cont-content col-9 flex-shrink-1">
                @yield('content')
            </div>

        </div>
    </main>

</body>

</html>
