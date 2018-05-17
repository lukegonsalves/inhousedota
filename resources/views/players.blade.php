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
                            <player-list :players="{{json_encode($players)}}">
                            </player-list>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        {{--Match Creator -implement draggable and workout combined mmr total for each team JS is probably the way to go again?--}}
        <div class="column is-one-third">
            @admin
            <div class ="box is-centered">
                <div class="content">
                <h3 class="title">Match Creator</h3>
                <h6 class="subtitle">Drag and drop players into each team</h6>
                

                <div class="columns">
                    <div class="column is-half">
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
                        </div>
                    </div>
                </div>



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
                                {{--Maybe 'cool' graphic or mmr difference here or something, alas david might need to do this cos i have rekindled my hate for JS--}}
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
            @endadmin
        </div>
    </div>
</section>
@endsection
