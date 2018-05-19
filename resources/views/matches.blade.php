@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <h1 class="title">Matches</h1>
        <h2 class="subtitle">
        100% Munt-verified SHITSHOWS
        </h2>
    </div>
</section>

{{--  Featured Match --}}
<section class = "section">
    <div class="columns is-centered">
      <figure class="image">
      <img src="https://i.ytimg.com/vi/IVXrhjD9OIQ/maxresdefault.jpg">
      </figure>
        <div class="column is-one-third">
          <div class="box">
            <div class="content">
                @foreach($matches as $match)
                @if ($matches->first() == $match)
                <p class="title has-text-centered">{{$match['match_name']}}</p>
                <p class="subtitle has-text-centered">{{$match['start_time']}} BST
                
                </p>
                @else
                @endif
                @endforeach
              <div class="columns is-centered">
                  <div class="column is-5">
                      <table class="table">
                          <thead><th>Team 1</th></thead>
                          <tbody>
                              <tr><td>Position 1</td></tr>
                              <tr><td>Position 2</td></tr>
                              <tr><td>Position 3</td></tr>
                              <tr><td>Position 4</td></tr>
                              <tr><td>Position 5</td></tr>
                              {{--Maybe 'cool' graphic or mmr difference here or something, alas david might need to do this cos i have rekindled my hate for JS--}}
                          </tbody>
                          </table>
                  </div> {{-- Maybe having a % chance of this team to win against the other, think of algorithm for calculating this. Progress bar graphic might be good here as well --}}
                  <div class="column is-2 has-text-centered">
                    <br><br><br><br>
                    <img src="{{ URL::asset('/images/versus.png') }}">

                  </div>
                  <div class="column is-5">
                      <table class="table">
                          <thead><th>Team 2</th></thead>
                          <tbody>
                              <tr><td>Position 1</td></tr>
                              <tr><td>Position 2</td></tr>
                              <tr><td>Position 3</td></tr>
                              <tr><td>Position 4</td></tr>
                              <tr><td>Position 5</td></tr>
                          </tbody>
                      </table>
                  </div>
                  
              </div>
              <div class="has-text-centered">
                <a href="https://www.twitch.tv/pyrionflax" target="_blank"><span class="tag is-primary has-text-weight-semibold"><i class="fab fa-twitch"></i>&nbspWatch live on twitch.tv&nbsp<i class="fas fa-external-link-alt"></i></span></a>
              </div>

            </div>
          </div>
        </div>

        <figure class="image">
          <img src="https://i.ytimg.com/vi/FIhyPMusUWg/maxresdefault.jpg">
        </figure>

    </div>
</section>
 
<section class = "section">
    <div class="columns is-centered">
        <div class="column is-two-thirds">
          <div class="box">
            <div class="content">
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