@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <h1 class="title">Matches</h1>
        <h2 class="subtitle">
        Match list from the inHouse
        </h2>
    </div>
</section>
<section class = "section">
    <div class="columns is-centered">
        <div class="column is-four-fifths">
                <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>MatchID</th>
                            <th>Match</th>
                            <th>Created Date</th>
                            <th>Lobby Password</th>
                            <th colspan="2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          @foreach($matches as $match)
                          @php
                            $date=date('d-m-Y', $match['date']);
                            @endphp
                          <tr>
                            <td>17171{{$match['id']}}</td>
                            <td>{{$match['match_name']}}</td>
                            <td>{{$match['created_at']->format('H:i F d, Y')}}</td>
                            <td>{{$match['lobby_password']}}</td>

                            <td>{{--    <a href="{{action('MatchController@edit', $match['id'])}}" class="btn btn-warning">Edit</a>     --}}</td>
                            <td>
                              <form action="{{action('MatchController@destroy', $match['id'])}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="button is-danger" type="submit">Delete</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                </table>
        </div>
    </div>
</section>
@endsection