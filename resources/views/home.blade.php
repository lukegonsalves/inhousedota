@extends('layouts.app')

@section('content')

<section class="font-sans antialiased w-full py-8">
        <div class="container mx-auto">
            <div class="mx-auto items-center text-center text-thin text-2xl text-white">EVENTS</div>
            <div class="py-8 w-full mx-auto">
                <div class="my-16 flex flex-wrap md:items-center w-full">
                    <div class="bg-white shadow rounded w-full md:w-1/2 z-10 border border-teal">
                        
                         <div class="text-center text-indigo-darkest font-semibold uppercase mt-8 mb-4 "><img src ="{{ URL::asset('/images/monday-inhouse-logo.png') }}" alt="Monday Inhouse"></div> 
                        <div class="py-0">
                            <!-- <img src="https://i.gyazo.com/711e6129eba83dae69c3f3d83d62a2f0.png" alt="" class="w-48">   -->
                            <div class="text-center text-indigo-darkest uppercase">Next Game starts in:</div>
                            <div class="mx-auto items-center flex text-center">
                                <countdown-timer date="2018-09-03 19:30:00"></countdown-timer></div>
                            <div class="mb-8 mx-auto w-2/3">
                                <div class="flex items-center mb-4">
                                    <span class="text-indigo-darker">
                                    Whether you've been a sub for 1 month or 1 year, shitter or gooder, this is the place to meet your fellow subs and play some good ol' dotes. Expect some pretty dodge ideas and SUB-optimal plays, after all this is just the equivalent of a 'kickabout with the lads' but in DOTA 2.
                                    </span>
                                </div>
                                <div class="flex items-center">
                                    <img class="w-10 h-10 rounded-full mr-4" src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/d4/d4df9499cc94978d72b052a6ae1f38e08e3b2377_full.jpg" alt="Avatar of Jonathan Reinink">
                                    <div class="text-sm">
                                      <p class="text-black leading-none">darkluke21</p>
                                      <p class="text-grey-dark">Inhouse Master, God of the game</p>
                                    </div>
                                    @auth
                                    @admin
                                    &nbsp;&nbsp;&nbsp; 
                                    <form method="post" action="{{url('resetStatus')}}" enctype="multipart/form-data">
                                        @csrf
                                            <button class="bg-orange-dark hover:bg-grey text-white font-semibold py-2 px-4 rounded inline-flex items-center" type="submit">
                                                <span class="icon is-small">
                                                    <i class="fas fa-sync"></i>
                                                </span>
                                                    &nbsp; Reset Pool
                                            </button>
                                    </form>
                                    @endadmin
                                    @endauth
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-indigo-darker rounded shadow w-5/6 md:w-1/2 z-0 mx-auto -mt-1 md:-mt-0 md:-ml-1 border border-teal">
                        <div class="py-8 text-center text-indigo-lightest font-semibold uppercase">Play Monday Inhouse</div>
                        <hr class="mb-8 my-0 border border-indigo-dark opacity-25">
                        <div class="w-4/5 mx-auto">
                            <p class="text-center text-sm text-indigo-lightest opacity-75 leading-normal">
                            If you are selected, the password for the game lobby will be visible on the matches page.
                            Please aim to be ready 10 minutes before the scheduled start of the match.  <br><br>
                            NB. Your availability will be automatically reset after each monday, so you will need to re-join to be pooled for selection.</p>
                        </div>
                        <div class="mb-8">
                        </div>
                        <div class="flex">
                                <form name="updateStatusIn" method="post" action="{{url('updateStatusIn')}}" enctype="multipart/form-data">
                                    @csrf
                                </form>
                            <a onclick="updateStatusIn.submit();return false;" class="py-8 opacity-50 bg-indigo-darkest hover:bg-indigo-dark text-indigo-lighter rounded rounded-t-none text-center uppercase font-bold flex-1 items-center justify-center ">
                                <span>Join</span> 
                                <span class="icon align-center">
                                    <i class="fas fa-sign-in-alt"></i>
                                </span>
                            </a>
                            <form name="updateStatusOut" method="post" action="{{url('updateStatusOut')}}" enctype="multipart/form-data">
                                @csrf
                            </form>
                            <a onclick="updateStatusOut.submit();return false;" class="py-8 opacity-50 bg-indigo-darkest hover:bg-indigo-dark text-indigo-lighter rounded rounded-t-none text-center uppercase font-bold flex-1 items-center justify-center">
                                <span>Exit</span> 
                                <span class="icon align-center">
                                    <i class="fas fa-sign-out-alt"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


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
