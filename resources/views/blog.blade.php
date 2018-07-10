@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <h1 class="title">Donate</h1>
        <h2 class="subtitle">
            Ways to support
        </h2>
    </div>
</section>
@auth
<section class="section">
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="box">
                <p>
                    Hi all,<br>
                    Just a quick one! For me this is very much a passion project and I try to commit as much time as possible, where possible to 
                    developing this inhouse site. However, being a student I'm skint! If you could spare
                    any shillings they would be gratefully received, contributing to help us to pay for servers, improve and develop the site to take it to the next level! 
                    <br>So, for those of you who <strong>really really really</strong> want to donate you can do so below!
                    <br><br>
                    <center><a class="button is-large is-rounded" target="_blank" href="https://www.buymeacoffee.com/8E37jwZgX"><img src="https://www.buymeacoffee.com/assets/img/BMC-btn-logo.svg" alt="Buy me a coffee"><span style="margin-left:5px">Buy me a coffee</span></a></center>
                    
                    <br>PS. At this stage we have nothing to give back, but we are working on perks for those who have helped us out!
                    <br>
                </p>
                Cheers,
                <h6 class = "title is-6">Luke
                <br><a class="button is-rounded"><i class="fab fa-discord"></i>&nbsp;darkluke21</a></h6>                
            <div>
        </div>
    <div>
</section> 
@endauth
<section class = "section">

    <div class="columns is-centered">

    </div>
    {{--        <modal></modal>     --}}
</section>
@endsection
