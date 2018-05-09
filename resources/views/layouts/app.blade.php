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
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>




</head>
<body>
    <div id="app">
        
        <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="navbar-brand" href="{{ url('/') }}">
                <a class = "navbar-item">
                {{ config('app.name', 'Laravel') }}
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
                    <a class="navbar-item" href="{{ route('teams') }}">
                        Teams
                    </a>
                    <a class="navbar-item" href="{{ route('profile') }}">
                        Profile
                    </a>
                </div>
                <div class="navbar-end">
                    @if (!Auth::check())
                    @else                  
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            <img src = "{{Auth::user()->avatarsmall}}">&nbsp;{{Auth::user()->username}}
                        </a>
                    
                        <div class="navbar-dropdown">
                          <a class="navbar-item" href = "{{ route('profile') }}">
                            Profile
                          </a>
                          <a class="navbar-item" href = "{{ route('players') }}">
                            Players
                          </a>
                          <a class="navbar-item">
                            Settings
                          </a>
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

        <nav class="level">
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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="footer is-primary">
            <div class="container">
                <div class="content has-text-centered">
                    <p>
                    <strong>{{ config('app.name', 'Laravel') }}</strong> by <a href="#">darkluke21</a>.
                    </p>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>