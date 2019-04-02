<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Wedding') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <div class="error-message">
            @if ($errors->has('email'))
                <strong>{{ $errors->first('email') }}</strong>
            @endif
            @if ($errors->has('password'))
                <strong>{{ $errors->first('password') }}</strong>
            @endif
        </div>

        <div class="header">
            <div class="logo">
                <div class="logo-container">
                    <img class="logo-img" src="{{ asset('uploads/planiranje2.jpg') }}" />
                </div>
            </div>

            <div class="nav">
                <nav>
                    <ul>
                        <li><a href="{{route('home')}}">Početna</a></li>
                        <li><a href="#">Usluge</a>
                            <ul>
                                <li><a href="{{route('offers-by-id', ['offer_type_id' => 1])}}">Fotografija</a></li>
                                <li><a href="{{route('offers-by-id', ['offer_type_id' => 2])}}">Glazba</a></li>
                                <li><a href="{{route('offers-by-id', ['offer_type_id' => 3])}}">Svadbene sale</a></li>
                                <li><a href="{{route('offers-by-id', ['offer_type_id' => 4])}}">Crkve</a></li>
                                <li><a href="{{route('offers-by-id', ['offer_type_id' => 5])}}">Šminka</a></li>
                                <li><a href="{{route('offers-by-id', ['offer_type_id' => 6])}}">Ostalo</a></li>
                            </ul>
                        </li>
                        @guest
                            <li><a href="">Prijava</a>
                                <div class="login-form">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div>
                                            <label>Email</label>

                                            <input type="text" name="email" class="login-inputs {{ $errors->has('email') ? ' is-invalid' : '' }}" required />

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div>
                                            <label>Loznika</label>

                                            <input type="password" name="password" class="login-inputs {{ $errors->has('password') ? ' is-invalid' : '' }}" required />

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div>
                                            <input type="submit" value="Ulogiraj se" />
                                        </div>
                                        <div>
                                            <a href="#" style="text-decoration:none;position:relative;right:-10px;
                                            font-size:12px;color:gray;">Zaboravio/la
                                                sam lozinku</a>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li><a href="{{route('register')}}">Registracija</a></li>
                        @else
                            <li class="nav-item dropdown" style="margin-top: 14px;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->role_id != 1)
                                        <a class="dropdown-item" href="{{route('admin-index') }}">
                                            Admin panel
                                        </a>
                                    @endif

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
                        <li><a href="#">Vizija</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/slider.js') }}"></script>

</body>
</html>
