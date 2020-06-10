@extends('layouts.app')
<title>Dating</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong class="d-flex justify-content-center" style="color: #1a95ff">
                            {{ Auth::user()->name }}, you are logged in! </strong>
                    </div>
                    <div class="form-group">
                        <strong class="d-flex justify-content-center" id="text">
                            <img class="gif"
                                 src="https://cdn.dribbble.com/users/542979/screenshots/5652350/people_chat_3.gif"><br>
                        </strong>
                        <div class="main-card">

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
    body {
        background-image: linear-gradient(#7f48ff, #d79eff, #ff63c3);
    }

    .gif {
        top: 30px;
        width: 400px;
        height: auto;
        position: relative;
        border-radius: 20px;
    }
</style>
