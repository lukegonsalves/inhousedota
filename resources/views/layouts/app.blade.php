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
<body background="{{ asset('images/background-wk-blur.png') }}">
    
    <div id="app">
         {{-- <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
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
                    <a class="navbar-item" href="{{ route('matches') }}">
                        Matches
                    </a>
                    <a class="navbar-item" href="{{ route('profile.self') }}">
                        Profile
                    </a>
                    <a class="navbar-item" href="{{ route('blog') }}">
                        Donate
                    </a>
                    <p class="navbar-item">
                        @if (Auth::check())
                        <span class="font-semibold mr-2 text-left flex-auto"></span>
                                  <span class="font-semibold mr-2 text-left flex-auto">tard count: {{Auth::user()->count()}}</span>
                                  <span class="flex rounded-full bg-indigo uppercase px-2 py-1 text-xs font-bold mr-3">New</span>
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
    --}}

        <nav class="relative select-none bg-indigo-darkest lg:flex lg:items-stretch w-full border-b border-teal">
            <div class="flex flex-no-shrink items-stretch h-12 text-sm uppercase font-medium">
              <a href="{{ route('home') }}" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center"> 
                <img src = "{{ URL::asset('/images/inhouse-logo-white.png') }}" class="fill-current h-8 w-19 mr-2" width="163" height="34">
              </a>
              <a href="{{ route('home') }}" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-indigo-darker hover:text-white">Home</a>
              <a href="{{ route('players') }}" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-indigo-darker hover:text-white">Players</a>
              <a href="{{ route('matches') }}" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-indigo-darker hover:text-white">Matches</a>
              <a href="{{ route('profile.self') }}" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-indigo-darker hover:text-white">Profile</a>
              <a href="{{ route('blog') }}" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-indigo-darker hover:text-white">Donate</a>
                    @if (Auth::check())
                    <span class="font-semibold mr-2 text-left flex-auto"></span>
                    <span class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center">tard count: {{Auth::user()->count()}}</span>
                    @endif
              <button class="block lg:hidden cursor-pointer ml-auto relative w-12 h-12 p-4">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/></svg>
              </button>
            </div>
            <div class="lg:flex lg:items-stretch lg:flex-no-shrink lg:flex-grow">
              <div class="lg:flex lg:items-stretch lg:justify-end ml-auto">
                @if (Auth::check())                
                    <p class="text-sm flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center">
                    <i>Logged in as,</i>&nbsp;{{Auth::user()->username}}
                    </p>
                @else
                <p class="text-sm flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center">
                <a href="auth/steam">
                    <img src="https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_01.png" width="144" height="28" border="0">
                </a>
                </p>
                @endif
              </div>
            </div>
          </nav>
          <ticker-tape></ticker-tape>
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
        {{-- <footer class="footer is-primary">
            <div class="container">
                <div class="content has-text-centered">
                    <p>
                        <p class="level-item has-text-centered">
                            <img src="{{ URL::asset('/images/inhouse-logo-grey.png') }}" style="height: 30px;">
                        </p>
                     Art taken from <a href="https://www.youtube.com/channel/UCaGWSIZnljlgNTSMzYnxTEg" target ="_blank">Pyrionflax</a>
                    </p>
                    <p class="has-text-grey has-text-bold">
                            <a href="{{    route('privacy')   }}">View our privacy policy</a>
                    </p>
                </div>
            </div>
        </footer> --}}
    </div>
    <section class="bg-indigo-darkest py-8 w-full border-t border-teal">
        <div class="container mx-auto px-8">
            <div class="table w-full">
                <div class="block sm:table-cell bg-indigo-darkest">
                    <p class="uppercase text-grey-lighter text-sm sm:mb-6">Links</p>
                    <ul class="list-reset text-xs mb-6">
                        <li class="mt-2 inline-block mr-2 sm:block sm:mr-0">
                            <a href="#" class="text-grey hover:text-grey-dark">FAQ</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 sm:block sm:mr-0">
                            <a href="#" class="text-grey hover:text-grey-dark">Help</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 sm:block sm:mr-0">
                            <a href="#" class="text-grey hover:text-grey-dark">Support</a>
                        </li>
                    </ul>
                </div>
                <div class="block sm:table-cell bg-indigo-darkest">
                    <p class="uppercase text-grey-lighter text-sm sm:mb-6">Legal</p>
                    <ul class="list-reset text-xs mb-6">
                        <li class="mt-2 inline-block mr-2 sm:block sm:mr-0">
                            <a href="{{    route('privacy')   }}" class="text-grey hover:text-grey-dark">Privacy</a>
                        </li>
                    </ul>
                </div>
                <div class="block sm:table-cell bg-indigo-darkest">
                    <p class="uppercase text-grey-lighter text-sm sm:mb-6">Social</p>
                    <ul class="list-reset text-xs mb-6">
                        <li class="mt-2 inline-block mr-2 sm:block sm:mr-0">
                            <a href="https://www.twitch.tv/darkluke21" class="text-grey hover:text-grey-dark">Twitch</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 sm:block sm:mr-0">
                            <a href="https://twitter.com/darkluke21" class="text-grey hover:text-grey-dark">Twitter</a>
                        </li>
                    </ul>
                </div>
                <div class="block sm:table-cell bg-indigo-darkest">
                    <p class="uppercase text-grey-lighter text-sm sm:mb-6">Inhouse Dota</p>
                    <ul class="list-reset text-xs mb-6">
                        <li class="mt-2 inline-block mr-2 sm:block sm:mr-0">
                            <a href="{{  route('blog')   }}" class="text-grey hover:text-grey-dark">Donate</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
