@extends('layouts.app')
<title>Dating</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a id="matches" href="{{ url('/user-card') }}">

                            <button class="btn btn-primary" id="back-to-profile" href="{{ url('/user-card') }}">
                                Profile
                            </button>
                        </a>
                    </div>
                    <div class="form-group">

                        <div class="main-card">
                            @if($user)
                                @foreach($user->getMatches() as $matchedUser)
                                    <img class="picture" src="{{ $matchedUser->affected->profile->getPicture() }}"/><br>
                                    <div class="info">
                                        <strong
                                            class="name">{{ $matchedUser->affected->name }} {{ $matchedUser->affected->surname }},
                                            {{ $matchedUser->affected->profile->age }}</strong>
                                        <br>
                                        <strong class="location">Lives in {{ $matchedUser->affected->location }} </strong><br>
                                    </div>
                                    <hr>
                                @endforeach
                            @else
                                <strong class="matches">No Matches yet</strong>
                                <p class="matches-small"> Find new people in your area!</p>
                                <a id="back-to-dating" href="{{ url('/dating') }}">
                                    <button class="btn btn-primary" id="back-to-profile" href="{{ url('/dating') }}">
                                        Dating
                                    </button>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>


    .picture {
        width: 120px;
        border-radius: 10px;
        height: auto;
        position: relative;
        left: 20px;
        top: 40px;
    }

    .name {
        position: relative;
        left: 180px;
        top: -65px;
        font-size: 16px;
    }

    .location {
        position: relative;
        left: 180px;
        top: -63px;
        font-size: 14px;
    }

    .bio {
        position: relative;
        left: 180px;
        top: -60px;
        color: gray;
        font-size: 13px;
        word-break: break-word;
        width: 100px;
    }

    #back-to-profile {
        position: relative;
        left: 630px;
    }

    .matches {
        position: relative;
        left: 300px;
        top: 30px;
        font-size: 20px;
    }

    #back-to-dating {
        position: relative;
        left: -290px;
        top: 40px;
    }

    .matches-small {
        position: relative;
        left: 270px;
        top: 40px;
        font-size: 16px;
    }
</style>
