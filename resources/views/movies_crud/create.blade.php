@extends('cinema.home')
@section('title', 'Create a movie ')

@section('content')



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
<center>
<p>
<h2>Добавяне на Филм</h2>
</p>
</center>

   <form action="{{ action('MoviesController@store') }}" method="post" id="create" enctype="multipart/form-data" files="true">

    <div class="form-group">
      <label for="Title">Заглавие </label>
        <p>
        <input id="title" type="text" class="form-control" name="title" placeholder="Тitle..." value="{{ old('body') }}">
        </p>
    </div>
    <div class="form-group">
      <label for="Poster">Постер </label>
        <p>
        <input id="poster" type="file" name="poster">
        </p>
    </div>

   <div class="form-group">
     <label for="description">Описание</label>
       <textarea form="create" class="form-control" rows="5" id="description" name="description" placeholder="The description..." style="resize: none;">{{ old('body') }}</textarea>
    </div>
     <div class="form-group">
  <label for="select_genre">Жанр (max:3):</label>
  @foreach($genres as $genre)
    <label class="checkbox-inline"><input id="cl_genres[]" name="cl_genres[]" type="checkbox" value="{{ $genre->genres }}">{{ $genre->genres }}</label>
  @endforeach  
 
    </div>
     <div class="form-group">
       <label for="country">Държава</label>
       <p>
       <input id="country" type="text" class="form-control" name="country" placeholder="Country">
       </p>
    </div>
    <div class="form-group">
       <label for="translation">Формат</label>
       <p>
      <label class="radio-inline"><input type="radio" name="translation" value="subtitles" checked="true">SUBTITLE</label>
      <label class="radio-inline"><input type="radio" name="translation" value="bg_audio">BG AUDIO</label>      
      </p>
    </div>
     <div class="form-group">
       <label for="translation">Видео Формат</label>
       <p>
      <label class="radio-inline"><input type="radio" name="video_format" value="2D" checked="true">2D</label>
      <label class="radio-inline"><input type="radio" name="video_format" value="3D">3D</label>
      </p>
    </div>
    <div class="form-group">
       <label for="Director">Продуцент</label>
       <p>
       <input id="director" type="text" class="form-control" name="director" placeholder="Director">
       </p>
    </div>
     <div class="form-group">
       <label for="age_rate">Age Rate</label>
        <p>
        <input id="age_rate" type="number" class="form-control" name="age_rate" placeholder="Age rate" min="1" max="18">
        </p>
    </div>
    <div class="form-group">
       <label for="bg_premiere">Премиера</label>
        <p>
        <input id="bg_premiere" type="date" class="form-control" name="bg_premiere">
        </p>
    </div>
    <div class="form-group">
       <label for="start_date">START Прожекции</label>
        <p>
        <input id="start_date" type="date" class="form-control" name="start_date">
        </p>
    </div>
    <div class="form-group">
       <label for="end_date">END Прожекции</label>
        <p>
        <input id="end_date" type="date" class="form-control" name="end_date">
        </p>
    </div>
    <div class="form-group">
       <label for="trailer">Трейлър</label>
        <p>
        <input id="trailer" type="text" class="form-control" name="trailer">
        </p>
    </div>
    <div class="form-group">
       <label for="Rating">Рейтинг</label>
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