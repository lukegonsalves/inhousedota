@extends('layouts.app')

@section('content')
    <section class="hero is-light is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                        <h3 class="title has-text-grey">Inhouse Dota Login</h3>

                    <div class="box">
                            <p class="subtitle has-text-grey">Please Sign in with Steam to proceed.</p>
                            <a href="auth/steam">
                                <img src="https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_02.png" width="109" height="66" border="0">
                            </a>
                    </div>
                    
                    <p class="has-text-grey has-text-bold">
                        <a href="../">View our privacy policy</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
