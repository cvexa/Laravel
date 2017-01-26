@extends('movies_crud.movies')
@section('content')


    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Info about this Movie</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ url('/movies') }}"> Back</a>

            </div>

        </div>

    </div>


<h1>Showing {{ $movie->title }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $movie->title }}</h2>
        <p>
        <iframe width="560" height="315" src="{{ $movie->trailer }}" frameborder="0" allowfullscreen></iframe>
        </p>
        <p>
            <strong>Description:</strong> {{ $movie->description }}<br>
            <p><strong>Movie added to DB by:</strong> {{ $movie->created_by }}</p>
            <p><strong>Added at :</strong> {{ $movie->created_at }}</p>
            <p><strong>Updated at :</strong> {{ $movie->updated_at }}</p>
        </p>
    </div>
@endsection