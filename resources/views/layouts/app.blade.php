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
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/2.0.46/css/materialdesignicons.min.css">

    <script>
        export default {
            data() {
                return {
                    navigation: 'home'
                }
            }
        }
    </script>

</head>
<body>
    <div id="app">
        
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand" href="{{ url('/') }}">
                <a class = "navbar-item">
                {{ config('app.name', 'Laravel') }}
                </a>
            </div>
    
            <div class="navbar-menu">
                <div class="navbar-start"></div>
                <div class="navbar-end">
                    @if (!Auth::check())
                    @else                  
                    <b-dropdown v-model="navigation" position="is-bottom-left">
                        <a class="navbar-item" slot="trigger">
                        <span><img src = "{{Auth::user()->avatarsmall}}"> {{Auth::user()->username}}</span>
                            <b-icon icon="menu-down"></b-icon>
                        </a>
                        <b-dropdown-item value="home">
                            <b-icon icon="home"></b-icon>
                            Home
                        </b-dropdown-item>  
                        <hr class="dropdown-divider">
                        <a href="{{ route('logout') }}">

                        <b-dropdown-item value="logout">
                            <b-icon icon="logout"></b-icon>
                            Logout
                        </b-dropdown-item>
                        </a>

                    </b-dropdown>
                    @endif

                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer is-primary">
        <div class="container">
            <div class="content has-text-centered">
                <p>
                <strong>{{ config('app.name', 'Laravel') }}</strong> by <a href="#">darkluke21</a>.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
