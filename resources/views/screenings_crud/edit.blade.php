@extends('cinema.home')
@section('title','Edit')


@section('content')


    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Промени Прожекция -  дата: {{ $movies->date }} / час: {{substr($movies->hour,0,5)}}</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ url('/screenings') }}"> Back</a>

            </div>

        </div>

    </div>




   <form action="{{ url('/screenings/'.$movies->id) }}" method="post" id="edit" enctype="multipart/form-data" files="true">
   {{ method_field('PUT') }}


    <div class="form-group">
      <label for="date">Дата </label>
        <p>
        <input id="date" type="date" class="form-control" name="date" placeholder="date..." value="{{ $movies->date }}">
        </p>
    </div>

  <div class="form-group">
     <label for="hour">Час</label>
       <input id="hour" type="time" class="form-control" name="hour" placeholder="Час..." value="{{ substr($movies->hour,0,5) }}">

    </div>


    
    
    <div class="form-group">
   <label for="movie_title">Филм</label><br>

  @foreach($movies2 as $movie)
    
  
 
 
    <label class="checkbox-inline">
    @if($movie->id == $movies->cm_movie_id)
  <label class="checkbox-inline"><input id="movie_title" name="cm_movie_id" type="radio" value="{{ $movie->id }}" checked="checked">{{ $movie->title }}</label>
    @else
  <label class="checkbox-inline"><input id="movie_title" name="cm_movie_id" type="radio" value="{{ $movie->id }}">{{ $movie->title }}</label>
    @endif
  @endforeach  
 
    </div>
    <div class="form-group">
      <label for="price">Цена</label>
       <p>
       <input id="price" type="number" class="form-control" name="price" step="0.01" value="{{ $movies->price }}" placeholder="Цена">
       </p>
    <div class="form-group">
       <label for="free_seats">Свободни места : </label>
       <p>
     <input id="free_seats" type="number" class="form-control" name="free_seats" value="{{ $movies->free_seats }}" placeholder="Свободни места за прожекцията">
      </p>
    </div>
    
    <div class="form-group">
      <p><input name="_token" type="hidden" value="{{ csrf_token() }}"/></p>
    </div>

    <input type="submit" class="btn btn-info" value="Edit">

</form>

<!-- <script type="text/javascript">

$('input[type=checkbox]').on('change', function (e) {
    if ($('input[type=checkbox]:checked').length > 3) {
        $(this).prop('checked', false);
    
    }
});
</script> -->

@endsection
