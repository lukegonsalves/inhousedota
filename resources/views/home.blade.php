@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <h1 class="title">Profile</h1>
        <h2 class="subtitle">
        Are you a <strong>shitter</strong> or a <strong>gooder</strong>? Lets see...
        </h2>
    </div>
</section>
<section class = "section">
    <div class = "columns is-centered">
        <div class="column is-one-third">
            <div class ="box">
                <article class = "media">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::check())
                        <div class="media-left">
                            <figure class="image is-128x128">
                                <img alt = "{{Auth::user()->username}}" src = "{{Auth::user()->avatarfull}}">
                            </figure>
                        </div>
                        <div class="media-content">
                        <div class="content">
                            <p class = "title is-5"><strong>{{ Auth::user()->username}} </strong><small><code>{{ Auth::user()->steamid}}</code> <code>{{ toUserID( Auth::user()->steamid) }}</code></small></p>
                            @else
                            @endif
                            <table class="table is-bordered is-narrow">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Bracket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ parseRank() }} <small>[{{ getRank() }}]</small></td>
                                        <td>{{ getBracket() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                </article>
            </div>
            <div class="box">
                <div class="content">
                    More Shiz
                    <blockquote>
                        <strong>NB:</strong> If your rank is between Herald 0 - Archon 5, you are placed in shitter bracket.
                        If your rank is Legend 0 or above you are placed in gooders bracket.
                    </blockquote>
                </div>
            </div>
        </div> 
    </div>
</section>
@endsection
