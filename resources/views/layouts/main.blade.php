<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/bootstrap-glyphicons.css') }}" rel="stylesheet"> -->
    <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> -->

    @yield('styles')
</head>
<body>
    <div id="app">
        <v-toolbar fixed color="light-blue accent-3">
          <v-toolbar-items class="hidden-sm-and-down">
            <!-- <div class="container"> -->
                <v-btn flat class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </v-btn>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- menu1 -->
                <li class="navbar"><a href="{{route('home')}}">Beranda</a></li>

                <!-- menu2 -->
                @if(Auth::user()->akses == '1' )
                <li class="navbar"><a href="/konsultasi">Konsultasi Dokter</a></li>
                @elseif(Auth::user()->akses == '3' )
                <li class="navbar"><a href="/konsultasi">Konsultasi Pasien</a></li>
                @elseif(Auth::user()->akses == '2' )
                <li class="navbar"><a href="{{route('obat.index')}}">Daftar Obat</a></li>
                @else

                @endif

                <!-- menu3 -->
                @if(Auth::user()->akses == '2' )
                <li class="navbar"><a href="{{route('apotekProfil.index')}}">Profil</a></li>

                @elseif(Auth::user()->akses == '1' )
                <li class="navbar"><a href="{{route('peopleProfil.index')}}">Profil</a></li>

                @elseif(Auth::user()->akses == '3' )
                <li class="navbar"><a href="{{route('dokterProfil.index')}}">Profil</a></li>

                @else

                @endif

                <!-- menu4 -->
                @if(Auth::user()->akses == '3' )

                @else
                  <li class="navbar"><a href="{{route('aktiforder')}}">Aktif Order</a></li>
                @endif

                <!-- menu4 -->
                @if(Auth::user()->akses == '3' )

                @else
                  <li class="navbar"><a href="{{route('order')}}">Riwayat Order</a></li>
                @endif

                @if(Auth::user()->akses == '4' )
                    <li class="navbar"><a href="{{route('reguser')}}">Daftarkan Dokter</a></li>
                @else

                @endif

                @if(Auth::user()->akses == '1' )
                <li class="navbar"><form class="navbar-form navbar-left" action="{{route('cari')}}">
                  <div class="input-group">
                    <input type="text" name="cari" class="form-control" placeholder="Cari Obat Disini" value="{{ old('cari') }}">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i>Search</i>
                         <!-- class="glyphicon glyphicon-search" -->
                      </button>
                    </div>
                  </div>
                </form>
                </li>
                @else

                @endif

              </v-toolbar-items>
                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
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
                <!-- </div> -->
            <!-- </div> -->

        </v-toolbar>

        <main class="mt-5">
            <v-container fluid>
                @include('flash-message')

                @yield('content')
            </v-container>
        </main>
    </div>

    @stack('scripts')

</body>
</html>
