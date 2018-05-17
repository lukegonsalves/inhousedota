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

{{--  Featured Match 
<section class = "section">
    <div class="columns is-centered">
        <div class="column is-half">
          <div class="box">
            <div class="content">
                <h3 class="title">Featured Match</h3>
            </div>
          </div>
        </div>
    </div>
</section>
 --}}

<section class = "section">
    <div class="columns is-centered">
        <div class="column is-two-thirds">
          <div class="box">
            <div class="content">
              @foreach($matches as $match)
              @if ($matches->first() == $match)
              {{$match['match_name']}}
              @else
              @endif
              @endforeach
              <h3 class="title">Upcoming Matches</h3>
                <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                              <span class="icon is-small is-left">
                                <i class="fas fa-hashtag"></i>
                              </span>
                            MatchID
                            </th>
                            <th>
                              <span class="icon is-small is-left">
                                <i class="fas fa-gamepad"></i>
                              </span>
                            Match
                            </th>
                            <th>
                              <span class="icon is-small is-left">
                                <i class="fas fa-clock"></i>
                              </span>
                            Start Time (BST)
                            </th>
                            <th>
                                <span class="icon is-small is-left">
                                  <i class="fas fa-user-secret"></i>
                                </span>
                              Creator
                            </th>
                            @admin<th>
                                <span class="icon is-small is-left">
                                  <i class="far fa-calendar-alt"></i>
                                </span>
                              Date Created
                              </th>@endadmin
                            <th>
                              <span class="icon is-small is-left">
                                <i class="fas fa-key"></i>
                              </span>
                            Lobby Password
                            </th>
                            @admin<th colspan="2">Action</th>@endadmin
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
                            <td>{{$match['start_time']}}</td>
                            <td>{{$match['creator']}}</td>
                            @admin<td>{{$match['created_at']->format('H:i F d, Y')}}</td>@endadmin
                            <td>{{$match['lobby_password']}}</td>

                            <td>{{--    <a href="{{action('MatchController@edit', $match['id'])}}" class="btn btn-warning">Edit</a>     --}}</td>
                            @admin<td>
                              <form action="{{action('MatchController@destroy', $match['id'])}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <span class="tag is-danger">
                                  Click X to delete match
                                  <button class="delete" type="submit"></button>
                                </span>
                              </form>
                            </td>@endadmin
                          </tr>
                          @endforeach
                        </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</section>
@endsection