@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <h1 class="title">{{ $user->username }}</h1>
        @if(Auth::user() == $user)
        <h2 class="subtitle">
            Are you a <strong>shitter</strong> or a <strong>gooder</strong>? Lets see...
        </h2>
        @endif
    </div>
</section>
<section class = "section">
    <div class = "columns is-centered">

            <figure class="image">
                    <img src="https://i.ytimg.com/vi/QBt6WJ4Ca_s/maxresdefault.jpg">
            </figure>

        <div class="column is-two-thirds">
            <div class ="box">
                <article class = "media">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="media-left">
                        <figure class="image is-128x128">
                            <img alt="{{ $user->username }}" src="{{ $user->avatarUrl }}">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p class="title is-5">
                                {{--  <strong>{{ $user->username}}</strong><br>  --}}
                                <a href="https://www.dotabuff.com/players/{{ $user->id32 }}">
                                <small>
                                    <code>SteamID64: {{ $user->id64}}</code><br><code>DotaID32: {{ $user->id32 }}</code>
                                </small>
                            </a>
                            </p>
                            <table class="table is-bordered is-narrow">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Bracket</th>
                                        <th>MMR (Est.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="has-text-primary">{{ $user->rankTier }}</td>
                                        <td>{{ $user->bracket }}</td>
                                        <td>{{ $user->mmr }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </article>
            </div>
            <div class="box">
                <div class="content">
                    <h2>Heroes</h2>
                    <table class="table is-bordered is-narrow">
                            <thead>
                                <tr>
                                    <th>Hero</th>
                                    <th>Games</th>
                                    <th>W/L</th>
                                    <th>Last Played</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->heroesPlayed as $hero)
                                <tr>
                                    <td>{{ heroById($hero['hero_id']) }}</td>
                                    {{--  <td>{{ dd() heroById($hero['hero_id'])->localized_name }}</td>  --}}
                                    <td>{{ $hero['games'] }}</td>
                                    <td><span class="has-text-success">{{ $hero['win'] }}</span> / <span class="has-text-danger">{{ $hero['games'] - $hero['win'] }}</span></td>
                                    <td>{{ \Carbon\Carbon::createFromTimestamp($hero['last_played'])->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <figure class="image">
                <img src="https://i.ytimg.com/vi/i20V5EUjyKE/maxresdefault.jpg">
        </figure> 
    </div>
</section>
@endsection
