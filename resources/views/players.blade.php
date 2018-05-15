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
                                <h3 class="title">Player Search</h3>
                            {{--Searchbar- remove inline js AND get persistent bracket or add brackets to the searchable blacklist--}}
                                    <script>
                                    function searchByUsername() {
                                      // Declare variables 
                                      var input, filter, table, tr, td, i;
                                      input = document.getElementById("inputSearch");
                                      filter = input.value.toUpperCase();
                                      table = document.getElementById("playerTable");
                                      tr = table.getElementsByTagName("tr");
                                    
                                      // Loop through all table rows, and hide those who don't match the search query
                                      for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[0];
                                        if (td) {
                                          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                          } else {
                                            tr[i].style.display = "none";
                                          }
                                        } 
                                      }
                                    }
                                    </script>                            
                                <p class="control has-icons-left">
                                        <input class="input is-small" type="text" placeholder="Search for tards by Username" id="inputSearch" onkeyup="searchByUsername()">
                                        <span class="icon is-small is-left">
                                          <i class="fas fa-search" aria-hidden="true"></i>
                                        </span>
                                </p>
                            <table class="table is-striped" id="playerTable">{{--Add MMR column AND W-L for inhouse dota games (this can be done in future)--}}
                                <thead>
                                    <th></th>
                                    <th>Username</th>
                                    <th>Rank</th>
                                    <th>MMR estimate</th>
                                    {{--  <th>Bracket <small>(0-5)</small></th>  --}}
                                    {{--  <th>Team</th>  --}}
                                </thead>
                                <tbody>
                                    {{--  group by rank  --}}
                                    @foreach ($ranks as $key => $rank)
                                        {{--       <tr><td><strong>Bracket {{$key}}</strong></td></tr>     --}}
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
                                            {{--    <td>Inhouse W/L Record</td>     --}}
                                            <td>{{ $user->mmr }}</td>
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
        {{--Match Creator -implement draggable and workout combined mmr total for each team JS is probably the way to go again?--}}
        <div class="column is-one-third">
            <div class ="box is-centered">
                <div class="content">
                <h3 class="title">Match Creator</h3>
                <h6 class="subtitle">Drag and drop players into each team</h6>
                <div class = "columns is-centered is-multiline">
                    <div class="column is-half">
                        <table class="table is-striped is-fullwidth">
                            <thead><th>Team 1</th></thead>
                            <tbody>
                                <tr><td>Position 1 <i class="far fa-plus-square" aria-hidden="true"></i></td></tr>
                                <tr><td>Position 2 <i class="far fa-plus-square" aria-hidden="true"></i></td></tr>
                                <tr><td>Position 3 <i class="far fa-plus-square" aria-hidden="true"></i></td></tr>
                                <tr><td>Position 4 <i class="far fa-plus-square" aria-hidden="true"></i></td></tr>
                                <tr><td>Position 5 <i class="far fa-plus-square" aria-hidden="true"></i></td></tr>
                                <tr><th>Combined MMR: xxxx</th></tr> {{--Maybe 'cool' graphic or mmr difference here or something, alas david might need to do this cos i have rekindled my hate for JS--}}
                            </tbody>
                            </table>
                    </div> {{-- Maybe having a % chance of this team to win against the other, think of algorithm for calculating this. Progress bar graphic might be good here as well --}}
                    <div class="column is-half">
                        <table class="table is-striped is-fullwidth">
                            <thead><th>Team 2</th></thead>
                            <tbody>
                                <tr><td>Position 1 <i class="far fa-plus-square" aria-hidden="true"></i></td></tr>
                                <tr><td>Position 2 <i class="far fa-plus-square" aria-hidden="true"></i></td></tr>
                                <tr><td>Position 3 <i class="far fa-plus-square" aria-hidden="true"></i></td></tr>
                                <tr><td>Position 4 <i class="far fa-plus-square" aria-hidden="true"></i></td></tr>
                                <tr><td>Position 5 <i class="far fa-plus-square" aria-hidden="true"></i></td></tr>
                                <tr><th>Combined MMR: xxxx</th></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="column is-two-thirds">
                        {{--    <div class="card">
                            <header class ="card-header">
                                <p class="card-header-title">Tools (BETA)</p>
                            </header>
                            <div class = "card-content">
                                <a class="button is-success">Balance these teams</a>
                                <a class="button is-danger">Fill randomly</a>
                            </div>
                        </div> --}}

                        {{--    <br>Balance of Power
                        <progress class="progress is-danger" value="50" max="100"></progress>   --}}
                    <div class="control">
                        <form method="post" action="{{url('matches')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="field">
                            <label class="label">Match Name</label>
                            <div class="control has-icons-left">
                                <input class="input is-focused" type="text" placeholder="Match Name" name="name">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-gamepad"></i>
                                </span>
                            </div>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <p class="help is-danger">{{ $error }}</p>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <p class="help">
                            Random Lobby Password will be generated
                        </p>
                        <button class="button is-primary" type="submit">Create Game</button>
                        </form>
                        
                    </div>
                    </div>
                </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection
