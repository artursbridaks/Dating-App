@extends('layouts.app')
<title>Dating</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        Edit Profile
                        <a class="back-to-profile" href="{{ url('/user-card') }}">

                            <button class="btn btn-primary" id="back-to-profile" href="{{ url('/user-card') }}">
                                Profile
                            </button>
                        </a>
                    </div>
                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form" method="post" enctype="multipart/form-data"
                              action="{{route('profile.update')}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                @if($user->profile->getPicture())
                                    <img class="profile" src="{{ $user->profile->getPicture() }}">
                                @else
                                    <img class="profile" src="{{ url('storage/picture/'. 'default.jpg') }}"/>
                                @endif
                            </div>
                            <hr>
                            <div>
                                <label for="name" class="name">Your Name: <strong> {{ $user->name }} </strong></label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Enter Name..." value="{{ old('name', $user->name) }}">
                            </div>
                            <hr>
                            <div>
                                <label for="surname" class="surname">Your Surname:
                                    <strong> {{ $user->surname }} </strong></label>
                                <input type="text" class="form-control" id="surname" name="surname"
                                       placeholder="Enter Surname..." value="{{ old('surname', $user->surname) }}">
                            </div>
                            <hr>
                            <label for="gender">Select gender:</label>
                            <select name="gender" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select><br>
                            <label for="gender" class="gender">Gender
                                selected:<strong>{{ $user->profile->gender }}</strong></label>
                            <hr>
                            <div>
                                <label for="location" class="location">Your Location:
                                    <strong> {{ $user->location }} </strong></label>
                                <input type="text" class="form-control" id="location" name="location"
                                       placeholder="Enter Location..." value="{{ old('location', $user->location) }}">
                            </div>
                            <hr>
                            <label for="age">Your age (+18):</label>
                            <input type="number" id="age" name="age" min="18" max="100"
                                   value="{{ old('age', $user->profile->age) }}"><br>
                            <label for="age" class="age">Age Selcted:
                                <strong> {{ $user->profile->age }} </strong></label>
                            <hr>
                            <div>
                                <label for="bio" class="bio">Your Bio:
                                    <strong> {{ $user->profile->bio }} </strong></label>
                                <input type="text" class="form-control" id="bio" name="bio"
                                       placeholder="Enter Bio..." value="{{ old('bio', $user->profile->bio) }}">
                            </div>
                            <hr>

                            <hr>
                            <div>
                                <input type="file" class="form-control-file" id="picture" name="picture">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" id="submit" name="picture">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    type = "text/javascript" >
        $('input').popup();
</script>

<style>
    {{-- Profile page styling --}}


                         /*.card-body{*/
    /*    align-content: center;*/
    /*}*/

    .back-to-profile {
        position: relative;
        left: 460px;
        background-color: #1a95ff;
        border: none;
    }

    #back-to-profile:hover {
        border-color: #d2c801;
        background-color: #d2c801;
        transition: 0.5s;
    }


    /* Input field color */
    #name, #surname, #location, #age {
        color: #1a95ff;
    }

    .form-control-file {
        color: #1a95ff;
    }

    /* Place holder color */
    form .form-control::-webkit-input-placeholder {
        color: #1a95ff;
        font-size: 12px;
    }

    /* Submit button style */

    /*#submit {*/
    /*    border: none;*/
    /*}*/

    /*#submit:hover {*/
    /*    background-color: #52cdff;*/
    /*    transition: 0.5s;*/
    /*}*/

    #submit {
        color: #FFF;
        transition: all 0.5s;
        position: relative;
        border: none;
    }

    #submit:hover {
        background-color: rgb(0, 184, 44);
    }

    #submit span {
        z-index: 2;
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
    }

    #submit::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        transition: all 0.5s;
        border: 1px solid rgba(255, 255, 255, 0.2);
        background-color: rgba(255, 255, 255, 0.1);
    }

    #submit::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        transition: all 0.5s;
        border: 1px solid rgba(255, 255, 255, 0.2);
        background-color: rgba(255, 255, 255, 0.1);
    }

    #submit:hover::before {
        transform: rotate(-45deg);
        background-color: rgba(255, 255, 255, 0);
    }

    #submit:hover::after {
        transform: rotate(45deg);
        background-color: rgba(255, 255, 255, 0);
    }

    #name, #surname, #location, #bio {
        width: 200px;
    }

    #picture {
        width: 200px;
    }

    img {
        width: 30%;
        border-radius: 20px;
    }

    .form-group:hover .profile {
        opacity: 0.6;
        transition: 0.5s;
    }

</style>
