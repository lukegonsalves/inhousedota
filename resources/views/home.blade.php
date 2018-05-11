@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <h1 class="title">PFlax InHouse Dota</h1>
        <h2 class="subtitle">
            Used to rank and pick players for the Monday night InHouse
        </h2>
    </div>
</section>
<section class = "section">
        <h1 class="title">This page is reserved for plays of the tournament</h1>
        {{--  <h2 class="subtitle"></h2>  --}}
        <div class="box">
            <iframe src="https://clips.twitch.tv/embed?clip=SlickCredulousAdminCoolStoryBob&autoplay=false&tt_medium=clips_embed" width="640" height="360" frameborder="0" scrolling="no" allowfullscreen="true"></iframe>
        </div>
</section>
@endsection
