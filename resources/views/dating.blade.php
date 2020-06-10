@extends('layouts.app')
<title>Dating</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="header-main">
                    {{--                    <strong class="header">Meet new people!</strong>--}}
                </div>
                <div class="card">
                    <div class="card-info">
                        <br>
                        @if($user)
                            <a id="matches" href="{{ url('/user-gallery/'.$user->id) }}">
                                <img class="rounded mx-auto d-block" id="user-picture"
                                     src="{{ $user->profile->picture_main }}">
                            </a>
                            <strong class="user-name">{{$user->name}} {{$user->surname}}
                                , {{$user->profile->age}} </strong>
                            <strong class="user-location">Lives in {{$user->location}}</strong>
                            <strong class="user-bio"> {{$user->profile->bio }}</strong>
                            <form method="post" action="{{ route('match.like', $user) }}">
                                @csrf
                                <button type="submit" id="like">LIKE</button>
                            </form>
                            <form method="post" action="{{ route('match.dislike', $user) }}">
                                @csrf
                                <button type="submit" id="dislike">PASS</button>
                            </form>
                        @else
                            No new users in your area
                        @endif
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

<script>
    function like() {
        const x = document.getElementById("match");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

<style>
    .header {
        position: relative;
        left: 290px;
        font-size: 20px;
    }

    #user-picture {
        width: 300px;
        height: auto;
        border-radius: 20px;
        border: solid black 2px;
    }

    .user-name {
        position: absolute;
        left: 215px;
        top: 325px;
        font-size: 20px;
    }

    .user-location {
        position: absolute;
        left: 215px;
        top: 350px;
        font-size: 15px;
    }

    .user-bio {
        position: absolute;
        left: 215px;
        top: 380px;
        color: gray;
        word-wrap: break-word;
        font-size: 13px;
        width: 300px;
    }

    #dislike {
        position: absolute;
        top: 430px;
        left: 305px;
        color: white;
        background-color: #a00000;
        border-radius: 10px;
        border: none;
    }

    #dislike:hover {
        background-color: #e50202;
    }

    #like {
        position: absolute;
        top: 430px;
        left: 360px;
        color: white;
        background-color: #367800;
        border-radius: 10px;
        border: none;
    }

    #like:hover {
        background-color: #00a000;
    }

    #match {
        position: absolute;
        top: 420px;
        left: 300px;
        font-size: 20px;
        color: hotpink;
        /*display: none;*/
    }
</style>
