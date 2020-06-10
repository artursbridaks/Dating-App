@extends('layouts.app')
<title>Gallery</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a id="matches" href="{{ url('/dating') }}">
                            <button class="btn btn-primary" id="back-to-profile" href="{{ url('/dating') }}">
                                Back
                            </button>
                        </a>
                    </div>
                    <div class="form-group">

                        <strong class="d-flex justify-content-center" id="text">
                        </strong>
                        <div class="main-card">

                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <strong>{{ $user->name }}'s gallery:</strong>
                            <br>
                            <br>
                            @foreach($gallery as $picture)
                                <img src="{{ $picture->getUrl() }}" alt="{{ $picture->name }}"/>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    img {
        width: 200px;
        height: auto;
        padding: 10px;
    }
</style>
