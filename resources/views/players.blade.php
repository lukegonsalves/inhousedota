@extends('layouts.app')

@section('content')
<!--
<section class="section">
    <div class="container">
        <h1 class="title has-text-white">Players</h1>
        <h2 class="subtitle has-text-light">
        All of the tards, some gooder than others...
        </h2>
    </div>
</section> -->
<section class = "section">

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {{-- {{ dd( $players ) }} --}}

            <player-page :players="{{ json_encode($players) }}" :user="{{json_encode(Auth::user())}}">

            </player-page>


        {{--Match Creator -implement draggable and workout combined mmr total for each team JS is probably the way to go again?--}}
        {{-- @admin
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
                            </tbody>
                            </table>
                    </div>
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
                           <div class="card">
                            <header class ="card-header">
                                <p class="card-header-title">Tools (BETA)</p>
                            </header>
                            <div class = "card-content">
                                <a class="button is-success">Balance these teams</a>
                                <a class="button is-danger">Fill randomly</a>
                            </div>
                        </div> 

                           <br>Balance of Power
                        <progress class="progress is-danger" value="50" max="100"></progress>  
                    <div class="control">
                        <form method="post" action="{{url('matches')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="field">
                            <label class="label">Match Name</label>
                            <div class="control has-icons-left">
                                <input class="input is-hovered" type="text" placeholder="Match Name" name="name">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-gamepad"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                                <label class="label">Scheduled Start Time (BST)</label>
                                <div class="control has-icons-left">
                                        <div class="select is-primary is-small">
                                            <select class ="is-hovered" name ="hours">
                                                <option value ="17">17</option>
                                                <option value ="18">18</option>
                                                <option value ="19">19</option>
                                                <option value ="20">20</option>
                                                <option value ="21">21</option>
                                                <option value ="22">22</option>
                                                <option value ="23">23</option>
                                            </select>
                                        </div>
                                        :
                                        <div class="select is-primary is-small">
                                            <select class ="is-hovered" name ="minutes">
                                                <option value ="00">00</option>
                                                <option value ="15">15</option>
                                                <option value ="30">30</option>
                                                <option value ="45">45</option>
                                            </select>
                                        </div>   
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-clock"></i>
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
        </div>            @endadmin --}}

</section>
@endsection
