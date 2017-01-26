@extends('movies_crud.movies')


@section('content')


    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Create New Movie</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ url('/movies') }}"> Back</a>

            </div>

        </div>

    </div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


   <form action="{{ action('MoviesController@store') }}" method="post" id="create">

    <div class="form-group">
      <label for="Title">Title</label>
        <p>
        <input id="title" type="text" class="form-control" name="title" placeholder="Тitle...">
        </p>
    </div>

   <div class="form-group">
     <label for="description">Description</label>
       <textarea form="create" class="form-control" rows="5" id="description" name="description" placeholder="The description..." style="resize: none;"></textarea>
    </div>
     <div class="form-group">
  <label for="genres">Genres (max:3):</label>
  @foreach($genres as $genre)
    <label class="checkbox-inline"><input id="select_genre" type="checkbox" value="{{ $genre->genres }}">{{ $genre->genres }}</label>
  @endforeach  
 
    </div>
     <div class="form-group">
       <label for="country">Country</label>
       <p>
       <input id="country" type="text" class="form-control" name="country" placeholder="Country">
       </p>
    </div>
    <div class="form-group">
       <label for="translation">Translation</label>
       <p>
      <label class="radio-inline"><input type="radio" name="translation" value="bg_audio">BG AUDIO</label>
      <label class="radio-inline"><input type="radio" name="translation" value="subtitles">SUBTITLE</label>
      </p>
    </div>
    <div class="form-group">
       <label for="Director">Director</label>
       <p>
       <input id="director" type="text" class="form-control" name="director" placeholder="Director">
       </p>
    </div>
     <div class="form-group">
       <label for="age_rate">Age rate</label>
        <p>
        <input id="age_rate" type="number" class="form-control" name="age_rate" placeholder="Age rate" min="1" max="18">
        </p>
    </div>
    <div class="form-group">
       <label for="bg_premiere">Bg Premiere</label>
        <p>
        <input id="bg_premiere" type="date" class="form-control" name="bg_premiere">
        </p>
    </div>
    <div class="form-group">
       <label for="start_date">START Date</label>
        <p>
        <input id="start_date" type="date" class="form-control" name="start_date">
        </p>
    </div>
    <div class="form-group">
       <label for="end_date">END Date</label>
        <p>
        <input id="end_date" type="date" class="form-control" name="end_date">
        </p>
    </div>
    <div class="form-group">
       <label for="trailer">Trailer</label>
        <p>
        <input id="trailer" type="text" class="form-control" name="trailer">
        </p>
    </div>
    <div class="form-group">
       <label for="Rating">Rating</label>
        <p>
        <input id="rating" type="number" class="form-control" name="rating" placeholder="Rating" min="1" max="10">
        </p>
    </div>

    <div class="form-group">
      <p>
      <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
      </p>
    </div>

    <input type="submit" class="btn btn-info" value="Create">

</form>

<script type="text/javascript">

$('input[type=checkbox]').on('change', function (e) {
    if ($('input[type=checkbox]:checked').length > 3) {
        $(this).prop('checked', false);
    
    }
});
</script>

@endsection