@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <h1 class="title">Inhouse Dota</h1>
        <h2 class="subtitle">
            No puns, politics, religion, lyrics or smurfs! Only Dota 2.
        </h2>
    </div>
</section>
@auth
<section class="section">
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="box">
                <h1 class="title">Upcoming Events</h1>
                    <div class="box column is-half">
                <h4 class ="title is-4 has-text-centered">Monday Inhouse</h4>
                <h6 class ="subtitle is-7 has-text-centered">Please set your availability (for now this make take a refresh to update)</h6>
                <h6 class ="subtitle is-6 has-text-centered">
                        <span class="icon is-small">
                            <i class="fa fa-gift"></i>
                        </span>
                        Prize pool: Your pride</h6>
                <h6 class ="subtitle is-6 has-text-centered">Your current status: <strong> {{  $user->status   }} </strong></h6>
                <div class="field is-grouped is-grouped-centered">
                <form method="post" action="{{url('updateStatusIn')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="control">
                        <button class="button is-success" type="submit">
                        <span class="icon is-small">
                            <i class="fas fa-check"></i>
                        </span>
                            &nbsp; Yes I'm in
                        </button>
                    </div>
                </form>
                &nbsp;
                <form method="post" action="{{url('updateStatusOut')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="control">
                        <button class="button is-danger" type="submit">
                        <span class="icon is-small">
                            <i class="fas fa-times"></i>
                        </span>
                            &nbsp; Not around :(
                        </button>
                    </div>
                </form>
                </div> 
            </div>             
            </div>
            @admin
            <div class="box">
                    <p class="title is-5">Admin tools</p>
                    <p class = "subtitle is-7">Be warned everyones availability will reset if you press this!</p><lr>
                    <div class="field is-grouped is-grouped">
                        <P>
                    <form method="post" action="{{url('resetStatus')}}" enctype="multipart/form-data">
                        @csrf
                            <button class="button is-warning" type="submit">
                                <span class="icon is-small">
                                    <i class="fa fa-refresh"></i>
                                </span>
                            <span>Reset All Players Availability</span>
                            </button>
                    </form>
                </p>
                </div>
            </div>  
            @endadmin       
        </div>
    <div>
</section> 
@endauth
<section class = "section">
        {{--     <h1 class="title">Hall of Fame</h1>
        <div class="box">
            <iframe src="https://clips.twitch.tv/embed?clip=SlickCredulousAdminCoolStoryBob&autoplay=false&tt_medium=clips_embed" width="640" height="360" frameborder="0" scrolling="no" allowfullscreen="true"></iframe>
            <iframe src="https://clips.twitch.tv/embed?autoplay=false&clip=SecretiveAnimatedBeeRitzMitz&tt_content=embed&tt_medium=clips_embed" width="640" height="360" frameborder="0" scrolling="no" allowfullscreen="true"></iframe>
        </div>      --}}

    <div class="columns is-centered">
        <div class="column is-one-quarter">
            <div class="card">
                <header class ="card-header">
                    <p class="card-header-title"><i class="fas fa-crown"></i>&nbsp;King Tardo of the Month</p>
                </header>
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <figure class="image is-48x48">
                                 <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                            </figure>
                          </div>
                          <div class="media-content">
                            <p class="title is-4">No-one yet</p>
                            <p class="subtitle is-6">Its probably gonna be bleapo</p>
                          </div>
                    </div>
                </div>   
            </div>
        </div>
        <div class="column is-one-quarter">
                <div class="card">
                    <header class ="card-header">
                        <p class="card-header-title"><i class="fas fa-crosshairs"></i>  &nbsp;MVP tryhard of the month (nobody cares)</p>
                    </header>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                     <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                </figure>
                              </div>
                              <div class="media-content">
                                <p class="title is-4">No-one yet</p>
                                <p class="subtitle is-6">cos this is new, calm down</p>
                              </div>
                        </div>
                    </div>   
                </div>
            </div>
    </div>
    {{--        <modal></modal>     --}}
</section>
@endsection
