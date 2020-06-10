@extends('layouts.app')
<title>Dating</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong class="d-flex justify-content-center" id="matches-text" style="color: #1a95ff">
                            {{ $userCard->name }} Profile
                            <a class="edit" href="{{ url('/profile') }}">
                                <button class="btn btn-primary" id="edit" href="{{ url('/profile') }}">
                                    Edit Profile
                                </button>
                            </a>
                            <a id="matches" href="{{ url('/matches') }}">

                                <button class="btn btn-primary" id="back-to-profile" href="{{ url('/matches') }}">
                                    Matches
                                </button>
                            </a>
                        </strong>
                    </div>
                    <div class="form-group">
                        <div class="main-card">
                            @if($userCard->profile->getPicture())
                                <img class="rounded mx-auto d-block" id="user-picture" name="picture"
                                     src="{{ $userCard->profile->getPicture() }}">
                            @else
                                <img class="rounded mx-auto d-block" id="user-picture" name="picture"
                                     src="{{ url('public/storage/picture/'. 'default.jpg') }}"/>
                            @endif

                            @if($userCard->name && $userCard->surname)
                                <strong class="user-name">{{ $userCard->name }}</strong>
                                <strong class="user-surname">{{ $userCard->surname }},</strong>
                            @else
                                <strong class="user-name">{{ $userCard->name }}</strong>
                            @endif


                            <strong class="user-age">{{ $userCard->profile->age }}</strong><br>
                            <strong class="user-location">Lives in {{ $userCard->location }}</strong>
                            <div class="user-bio">
                                <strong class="bio"> {{ $userCard->profile->bio }}</strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>

    img {
        width: 250px;
        height: auto;
        position: relative;
        top: 10px;
        border-radius: 15px;
    }

    #matches {
        display: inline;
        position: relative;
        border: none;
        left: -480px;
    }

    #back-to-profile:hover {
        /*border: none;*/
        border-color: #d2c801;
        background-color: #d2c801;
        transition: 0.5s;
    }

    #matches-text {
        position: relative;
        left: 80px;
    }

    .edit {
        color: white;
    }

    .edit:hover {
        color: white;
        text-decoration: none;
    }

    #edit {
        background-color: #1a95ff;
        border: none;
        position: relative;
        left: 220px;
    }

    #edit:hover {
        background-color: #d2c801;
        transition: 0.5s;
    }

    .user-name {
        position: relative;
        left: 240px;
        top: 15px;
        font-size: 20px;
        color: #1a95ff;
    }

    .user-surname {
        position: relative;
        left: 240px;
        top: 15px;
        font-size: 20px;
        color: #1a95ff;
    }

    .user-age {
        position: relative;
        left: 245px;
        top: 15px;
        font-size: 16px;
    }

    .user-location {
        position: relative;
        left: 240px;
        top: 15px;
        font-size: 16px;
    }

    .user-bio {
        position: relative;
        left: 240px;
        top: 25px;
        font-size: 13px;
        color: gray;
        width: 240px;
        word-wrap: break-word;
    }

</style>
