@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <h1 class="title">Players</h1>
        <h2 class="subtitle">
        All of the <strong>tards</strong>, some<strong> gooder </strong>than others...
        </h2>
    </div>
</section>
<section class = "section">
    <div class = "columns is-centered">
        <div class="column is-two-thirds">
            <div class ="box">
                <article class = "media">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="media-content">
                        <div class="content">
                            <table class="table is-narrow is-striped">
                                <thead>
                                    <th></th>
                                    <th>Username</th>
                                    <th>Rank</th>
                                    {{--  <th>Bracket <small>(0-5)</small></th>  --}}
                                    {{--  <th>Team</th>  --}}
                                </thead>
                                <tbody>
                                    {{--  group by rank  --}}
                                    @foreach ($ranks as $key => $rank)
                                        <tr><td><strong>Bracket {{$key}}</strong></td></tr>
                                        @foreach ($rank as $user)
                                        <tr>
                                            <td>
                                                <img alt="{{ $user->username }}" src="{{$user->smallAvatarUrl}}">
                                            </td>
                                            <td>
                                                <a href="{{route('profile.user',$user)}}">{{ $user->username }} </a>
                                                {{--  TODO Use Icon for if online - dynamicly added  --}}
                                                {{--  <i class="fas fa-check-circle"></i>  --}}
                                            </td>
                                            <td>{{ $user->rankTier }}</td>
                                            {{--  <td>{{ $user->bracket }}</td>   --}}
                                            {{--  <td>Undrafted </td>  --}}
                                        </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </article>
            </div>
        </div> 
    </div>
</section>
@endsection
