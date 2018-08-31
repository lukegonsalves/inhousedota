@extends('layouts.app')

@section('content')
    <section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered border-teal">
                <div class="columns is-centered">
                    <!-- <figure class="image">
                            <img src="https://i.ytimg.com/vi/pWN3x2iyIkE/maxresdefault.jpg">
                    </figure> -->
                    <div class="column is-one-third">
                    <div class="bg-indigo-darker shadow-md rounded px-8 pt-6 pb-8 mb-4 border-teal border">
                            <div class="text-grey-lightest font-semibold uppercase opacity-75">Inhouse Dota Login</div>
                            <hr class="mb-4 mt-6 border border-indigo-dark opacity-25">
                            <p class="text-sm text-grey leading-normal opacity-75 mb-4">Please Sign in with Steam to proceed.</p>
                            <a href="auth/steam">
                                <img src="https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_02.png" width="109" height="66" border="0">
                            </a>
                    </div>
                    <p class="text-center text-grey text-xs">
                        ©2018 Inhouse Dota. All rights reserved.
                    </p>
                    </div>
                    <!-- <figure class="image">
                            <img src="https://i.ytimg.com/vi/yb9IHDPR_F4/maxresdefault.jpg">
                    </figure> -->
                </div>

            </div>

        </div>
    </section>
@endsection
