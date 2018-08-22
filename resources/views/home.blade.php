@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <h1 class="title has-text-white">Inhouse Dota</h1>
        <h2 class="subtitle has-text-light">
            No puns, politics, religion, lyrics or smurfs! Only Dota 2.
        </h2>
    </div>
</section>
@auth
<section class="hero is-fullheight">
    <div class="flex mb-4">
        <div class="w-1/5 h-12"></div>
        <div class="w-2/5 h-12">
            <div id="<player div ID>"></div> 
                <div class="max-w-md w-full lg:flex">
                        <div class="h-12 lg:h-auto lg:w-24 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('https://d1u5p3l4wpay3k.cloudfront.net/dota2_gamepedia/c/cd/Rearm_icon.png?version=aac0e17017eb53fbeab1acc1da6152f1')" title="Tinker Rearm">
                        </div>
                        <div class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                          <div class="mb-8">
                            <div class="text-black font-bold text-xl mb-2">The-Post-TI8-Autumn-Update</div>
                            <p class="text-grey-darker text-base">
                                With the 8th iteration of The International completed, the return of Pyrion, and the end of the summer holidays... 
                                An update to our UI brings a fresh new lick of paint and some reworked back-end logic, so dust off your monitor and get ready to dive back into <strong>Inhouse Dota!</strong>
                            </p>
                          </div>
                          <div class="flex items-center">
                            <img class="w-10 h-10 rounded-full mr-4" src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/d4/d4df9499cc94978d72b052a6ae1f38e08e3b2377_full.jpg" alt="Avatar of Jonathan Reinink">
                            <div class="text-sm">
                              <p class="text-black leading-none">darkluke21</p>
                              <p class="text-grey-dark">Aug 23</p>
                            </div>
                          </div>
                        </div>
                      </div>


                </div>&nbsp; &nbsp; &nbsp; <br>
                <div class="w-2/5 h-12">
                    <div class="max-w-md w-full lg:flex">
                            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('https://i.gyazo.com/711e6129eba83dae69c3f3d83d62a2f0.png')" title="Woman holding a mug">
                            </div>
                            <div class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                              <div class="mb-8">
                                <p class="text-sm text-grey-dark flex items-center">
                                  <svg class="fill-current text-grey w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                                  </svg>
                                  Twitch Subscribers only 
                                </p>
                                <div class="text-black font-bold text-xl mb-2">Monday Inhouse</div>
                                <p class="text-grey-darker text-base">Prepare for some pretty dodge ideas and crappy game themes. What were you expecting ...?
                                    <!-- <br>
                                    Current Status: <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">{{  $user->status   }}</span> -->
                                        <div class="inline-flex">
                                        <form method="post" action="{{url('updateStatusIn')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="control">
                                                <button class="bg-grey-light hover:bg-grey text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center" type="submit">
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
                                                <button class="bg-grey-light hover:bg-grey text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center" type="submit">
                                                <span class="icon is-small">
                                                    <i class="fas fa-times"></i>
                                                </span>
                                                    &nbsp; Not around :(
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </p>
                              </div>
        
                              <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full mr-4" src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/d4/d4df9499cc94978d72b052a6ae1f38e08e3b2377_full.jpg" alt="Avatar of Jonathan Reinink">
                                <div class="text-sm">
                                  <p class="text-black leading-none">darkluke21</p>
                                  <p class="text-grey-dark">Aug 22</p>
                                </div>
                                @admin
                                &nbsp;&nbsp;&nbsp; 
                                <form method="post" action="{{url('resetStatus')}}" enctype="multipart/form-data">
                                    @csrf
                                        <button class="bg-orange-dark hover:bg-grey text-white font-semibold py-2 px-4 rounded inline-flex items-center" type="submit">
                                            <span class="icon is-small">
                                                <i class="fas fa-sync"></i>
                                            </span>
                                                &nbsp; Reset all player availability
                                        </button>
                                </form>
                                @endadmin
                              </div>
                            </div>
                          </div>              



                    </div>
                </div>

                <script src= "http://player.twitch.tv/js/embed/v1.js"></script>
                <script type="text/javascript">
                  var options = {
                    width: 854,
                    height: 480,
                    channel: "pyrionflax",
                  };
                  var player = new Twitch.Player("<player div ID>", options);
                  player.setVolume(0.5);
                </script>

</section> 
@endauth
<!--<section class = "section">
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
</section> -->
@endsection
