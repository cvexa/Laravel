@extends('cinema.home')
@section('title', 'Create a movie ')

@section('content')



            <div class="pull-right">

                <a class="btn btn-primary" href="{{ url('/screenings') }}"> Back</a>

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
<h2>Добавяне на Прожекция</h2>
</p>
</center>

   <form action="{{ action('ScreeningsController@store') }}" method="post" id="create" enctype="multipart/form-data" files="true">

    <div class="form-group">
      <label for="date">Дата </label>
        <p>
        <input id="date" type="date" class="form-control" name="date" placeholder="date..." value="{{ old('body') }}">
        </p>
    </div>
  <!--   <div class="form-group">
      <label for="Poster">Постер </label>
        <p>
        <input id="poster" type="file" name="poster">
        </p>
    </div> -->

   <div class="form-group">
     <label for="hour">Час</label>
       <input id="hour" type="time" class="form-control" name="hour" placeholder="Час..." value="{{ old('body') }}">

    </div>
     <div class="form-group">
  <label for="movie_title">Филм</label><br>

  @foreach($movies as $movie)
    <label class="checkbox-inline"><input id="movie_title" name="cm_movie_id" type="radio" value="{{ $movie->id }}">{{ $movie->title }}</label>
  @endforeach  
 
    </div>
     <div class="form-group">
       <label for="price">Цена</label>
       <p>
       <input id="price" type="number" class="form-control" name="price" step="0.01" placeholder="Цена">
       </p>
    </div>
    <div class="form-group">
       <label for="free_seats">Свободни места : </label>
       <p>
     <input id="free_seats" type="number" class="form-control" name="free_seats" placeholder="Свободни места за прожекцията">
      </p>
    </div>
   

    <div class="form-group">
      <p>
      <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
      </p>
    </div>

    <input type="submit" class="btn btn-info" value="Create">

</form>
<!-- 
<script type="text/javascript">

$('input[type=checkbox]').on('change', function (e) {
    if ($('input[type=checkbox]:checked').length > 3) {
        $(this).prop('checked', false);
    
    }
});
</script> -->

@endsection