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
                                  
      @php
      $first_match = $matches->first();
    @endphp
        <div class="column is-one-third">
          <div class="box">
            <div class="content">
                @foreach($matches as $match)
                @if ($matches->first() == $match)
                <p class="title has-text-centered">{{$match['match_name']}}</p>
                <p class="subtitle has-text-centered">{{$match['start_time']}} BST
                @if($first_match->allPlayers->contains(auth()->user()))
                  <p class="subtitle is-size-6 has-text-centered">
                    <span class="icon is-small is-left"><i class="fas fa-key"></i></span>
                    Lobby Password: <strong>{{$match['lobby_password']}}</strong>
                {{--  @else  --}}
                @endif
                </p>
                @else
                @endif
                @endforeach
              <div class="columns is-centered">
                  <div class="column is-5">
                      <table class="table">
                          <thead><th class="has-text-danger">Dire</th></thead>
                          <tbody>

                            @if(!is_null($first_match))
                              @foreach($first_match->direTeam as $user)
                                <tr><td> {{ $user->username }}</td></tr>
                              @endforeach
                            @endif
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
                          <thead><th class="has-text-success">Radiant</th></thead>
                          <tbody>
                            @if(!is_null($first_match))
                              @foreach($first_match->radiantTeam as $user)
                                <tr><td> {{ $user->username }}</td></tr>
                              @endforeach
                            @endif
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
                            <td>Hidden{{--{{$user->find($match['creator'])->username}}--}}</td>
                            @admin<td>{{$match['created_at']->format('H:i F d, Y')}}</td>@endadmin
                            @if($first_match->allPlayers->contains(auth()->user()) || auth()->user()->isAdmin || auth()->user()->id32 == $user->find($match['creator'])->id32 ) 
                            <td>{{$match['lobby_password']}}</td>
                            @else
                            <td>
                              <span class="icon is-small">
                                <i class="fas fa-lock"></i>
                              </span>
                              Hidden
                            </td>
                            @endif
                            <td>{{--    <a href="{{action('MatchController@edit', $match['id'])}}" class="btn btn-warning">Edit</a>     --}}</td>
                            @admin<td>
                              <form action="{{action('MatchController@destroy', $match['id'])}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                  <button class="button is-danger is-outlined" type = "submit">
                                    <span>Delete</span>
                                    <span class="icon is-small">
                                      <i class="fa fa-times"></i>
                                    </span>
                                  </button>
                                  <button class="button is-info is-outlined" title="Disabled button" disabled>
                                    <span>Complete</span>
                                    <span class="icon is-small">
                                      <i class="fas fa-check"></i>
                                    </span>
                                  </button>
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