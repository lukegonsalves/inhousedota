<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


</head>
<body>
    <div id="app">
        <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="navbar-brand" href="{{ url('/') }}">
                <a class = "navbar-item">
                        <img src="{{ URL::asset('/images/inhouse-logo-white.png') }}">
                </a>
            </div>
    
            <div class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="{{ route('home') }}">
                        Home
                    </a>
                    <a class="navbar-item" href="{{ route('players') }}">
                        Players
                    </a>
                    {{--  <a class="navbar-item" href="{{ route('teams') }}">
                        Teams
                    </a>  --}}
                    <a class="navbar-item" href="{{ route('matches') }}">
                        Matches
                    </a>
                    <a class="navbar-item" href="{{ route('profile.self') }}">
                        Profile
                    </a>
                    <p class="navbar-item subtitle is-7">
                        @if (Auth::check())
                        tard count: {{Auth::user()->count()}}
                        @endif
                    </p>
                    
                </div>
                <div class="navbar-end">
                    @if (Auth::check())                
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            <img src = "{{Auth::user()->avatarsmall}}">&nbsp;{{Auth::user()->username}}
                        </a>
                        <div class="navbar-dropdown">
                          <a class="navbar-item" href = "{{ route('profile.self') }}">
                            Profile
                          </a>
                          <a class="navbar-item" href = "{{ route('players') }}">
                            Players
                          </a>
                          {{--  <a class="navbar-item">
                            Settings
                          </a>  --}}
                          <hr class="navbar-divider">
                          <div class="navbar-item">
                            <a href = "{{ route('logout') }}">Logout</a>
                          </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </nav>
        {{--  <nav class="level">
                <p class="level-item has-text-centered">
                  <a class="link is-info">Home</a>
                </p>
                <p class="level-item has-text-centered">
                  <a class="link is-info">Menu</a>
                </p>
                <p class="level-item has-text-centered">
                    <a class ="link is-info">Inhouse </a>
                 <!-- <img src="https://bulma.io/images/bulma-type.png" alt="" style="height: 30px;"> -->
                </p>
                <p class="level-item has-text-centered">
                  <a class="link is-info">Reservations</a>
                </p>
                <p class="level-item has-text-centered">
                  <a class="link is-info">Contact</a>
                </p>
        </nav>  --}}

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="footer is-primary">
            <div class="container">
                <div class="content has-text-centered">
                    <p>
                        <p class="level-item has-text-centered">
                            <img src="{{ URL::asset('/images/inhouse-logo-grey.png') }}" style="height: 30px;">
                        </p>
                        by <a href="#">darkluke21</a> and <a href="#">davidpiesse</a>. Art taken from <a href="https://www.youtube.com/channel/UCaGWSIZnljlgNTSMzYnxTEg" target ="_blank">Pyrionflax</a>
                    </p>
                    <p class="has-text-grey has-text-bold">
                            <a href="{{    route('privacy')   }}">View our privacy policy</a>
                    </p>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>
