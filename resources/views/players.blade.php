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
        <div class="column is-half">
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
                                    <th>Username</th>
                                    <th>Rank</th>
                                    <th>Bracket</th>
                                    <th>Team</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <img alt = "{{$user->username}}" src = "{{$user->avatarsmall}}">
                                            {{ $user->username }} <i class="fas fa-check-circle"></i>
                                        </td>
                                        <td>{{ $user->rankname }} <small>[{{ $user->rank }}]</small></td>
                                        <td>{{ $user->bracket }}</td>
                                        <td>Undrafted </td>
                                    </tr>
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
