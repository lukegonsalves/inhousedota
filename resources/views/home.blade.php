@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::check())
                    <img src = "{{Auth::user()->avatar}}">
                    <p>Welcome back, {{ Auth::user()->username}}.</p>
                    <p>{{ Auth::user()->steamid}}</p>
                    @else
                    @endif
                    You are logged in!
                    {{ getRank() }}
                    {{ toUserID( Auth::user()->steamid) }}
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
