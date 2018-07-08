@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <h1 class="title">Updates</h1>
        <h2 class="subtitle">
            Some thoughts
        </h2>
    </div>
</section>
@auth
<section class="section">
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="content">
                <p>
                    This will be a paragraph of text where I persuade you to not donate any money.
                    Now since you've read through all of this. 
                    If you <strong>really really really</strong> want to donate. 
                    Anything you do kindly donate will be used to further develop the inhouse site!
                    At this stage we have nothing we can give back, but we are working on things in future for you.
                    <br>
                    You can donate via PayPal below:
                </p>
                Cheers,
                <h6 class = "title is-6"><strong>Luke </strong><i>@darkluke21</i></h6>
                <h6 class = "subtitle is-6">06/07/18<h6>
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
