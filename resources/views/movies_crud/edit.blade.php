@extends('cinema.home')
@section('title','Edit')


@section('content')


    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Промени Филм -  {{ $movie->title }}</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ url('/movies') }}"> Back</a>

            </div>

        </div>

    </div>




   <form action="{{ url('/movies/'.$movie->id) }}" method="post" id="edit" enctype="multipart/form-data" files="true">
   {{ method_field('PUT') }}


    <div class="form-group">
      <label for="Title">Заглавие <!-- <p>{{ $movie->title }}</p> --></label>
        <p>
        <input id="title" type="text" class="form-control" name="title" value="{{ $movie->title }}" placeholder="new Title...">
        </p>
    </div>

  <div class="form-group">
      <label for="Poster">Постер </label>
      <p><img src="{{ url('/posters/'.$movie->poster) }}" width="200px" height="200px" alt="edit image" /></p>
        <p>
        <input type="hidden" name="old_poster" value="{{ url('/posters/'.$movie->poster) }}">
        <input id="poster" type="file" name="poster">
        </p>
    </div>


     <div class="form-group">
     <label for="description">Описание <!-- {{ $movie->description }} -->
     </label>
       <textarea form="edit" class="form-control" rows="5" id="description" name="description" placeholder="edit the description..." style="resize: none;">{{ $movie->description }}</textarea>
    </div>
    <div class="form-group">
  <label for="genres">Жанрове (max:3):</label>
  @foreach($genres as $genre)
    <label class="checkbox-inline">
    @if($movie->cl_genre_id1 == $genre->genres || $movie->cl_genre_id2 == $genre->genres || $movie->cl_genre_id3 == $genre->genres)
    <input id="select_genre" name="cl_genres[]" type="checkbox" value="{{ $genre->genres }}" checked="checked" >{{ $genre->genres }}</label>
    @else
    <input id="select_genre" name="cl_genres[]" type="checkbox" value="{{ $genre->genres }}">{{ $genre->genres }}</label>
    @endif
  @endforeach  
 
    </div>
    <div class="form-group">
       <label for="country">Държава <!-- <p>{{ $movie->country }} --></label>
       <p>
       <input id="country" type="text" class="form-control" name="country" value="{{ $movie->country }}" placeholder="Country">
       </p>
    </div>
    <div class="form-group">
       <label for="translation">Формат</label>
       <p>
      @if($movie->translation == 'bg_audio')
      <label class="radio-inline"><input type="radio" name="translation" value="bg_audio" checked="checked">BG AUDIO</label>
      <label class="radio-inline"><input type="radio" name="translation" value="subtitles">SUBTITLE</label>
      @else
       <label class="radio-inline"><input type="radio" name="translation" value="bg_audio">BG AUDIO</label>
      <label class="radio-inline"><input type="radio" name="translation" value="subtitles" checked="checked">SUBTITLE</label>
      @endif
      </p>
    </div>
     <div class="form-group">
       <label for="video_format">Видео Формат</label>
       <p>
      @if($movie->video_format == '3D')
      <label class="radio-inline"><input type="radio" name="video_format" value="3D" checked="checked">3D</label>
      <label class="radio-inline"><input type="radio" name="video_format" value="2D">2D</label>
      @else
       <label class="radio-inline"><input type="radio" name="video_format" value="3D">3D</label>
      <label class="radio-inline"><input type="radio" name="video_format" value="2D" checked="checked">2D</label>
      @endif
      </p>
    </div>
    <div class="form-group">
       <label for="Director">Продуцент <!-- <p>{{ $movie->director }} --></p></label>
       <p>
       <input id="director" type="text" class="form-control" name="director" value="{{ $movie->director }}" placeholder="new Director">
       </p>
    </div>
     <div class="form-group">
       <label for="age_rate">Age rate <!-- <p>{{ $movie->age_rate }} --></label>
        <p>
        <input id="age_rate" type="number" class="form-control" name="age_rate" placeholder="age_rate" min="1" max="18" value="{{ $movie->age_rate}}">
        </p>
    </div>
    <div class="form-group">
       <label for="bg_premiere">Премиера <!-- <p>{{ $movie->bg_premiere }}</p> --></label>
        <p>
        <input id="bg_premiere" type="date" class="form-control" name="bg_premiere" value="{{ $movie->bg_premiere }}">
        </p>
    </div>
    <div class="form-group">
       <label for="start_date">START Прожекции <!-- <p>{{ $movie->start_date }}</p> --></label>
        <p>
        <input id="start_date" type="date" class="form-control" name="start_date" value="{{ $movie->start_date }}">
        </p>
    </div>
    <div class="form-group">
       <label for="end_date">END Прожекции <!-- <p>{{ $movie->end_date }}</p> --></label>
        <p>
        <input id="end_date" type="date" class="form-control" name="end_date" value="{{ $movie->end_date }}">
        </p>
    </div>
    <div class="form-group">
       <label for="trailer">Трейлър</label>
        <p>
        <input id="trailer" type="text" class="form-control" name="trailer" value="{{ $movie->trailer }}">
        </p>
    </div>
    <div class="form-group">
       <label for="Rating">Рейтинг <!-- <p>{{ $movie->rating }}</p> --></label>
        <p>
        <input id="rating" type="number" class="form-control" name="rating"  value="{{ $movie->rating }}" placeholder="new Rating" min="1" max="10">
        </p>
    </div>

    <div class="form-group">
      <p><input name="_token" type="hidden" value="{{ csrf_token() }}"/></p>
    </div>

    <input type="submit" class="btn btn-info" value="Edit">

</form>

<script type="text/javascript">

$('input[type=checkbox]').on('change', function (e) {
    if ($('input[type=checkbox]:checked').length > 3) {
        $(this).prop('checked', false);
    
    }
});
</script>

@endsection
