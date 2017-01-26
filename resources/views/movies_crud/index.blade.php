    @extends('movies_crud.movies')
    @section('content')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Movies CRUD</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ url('movies/create') }}"> Create New Movie</a>
                </div>
            </div>
        </div>
    <!--     @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif -->
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Details</th>
                <th>Director</th>
                <th>Bg Premiere</th>
                <th>Rating</th>
                <th width="280px">Action</th>
            </tr>
           <!-- <?php echo var_dump($movies) ?>  -->
        @foreach ($movies as $movie)
        <tr>
            <td>{{ $movie->id }}</td>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->description }}</td>
            <td>{{ $movie->director }}</td>
            <td>{{ $movie->bg_premiere }}</td>
            <td>{{ $movie->rating }}</td>
        

            <td>
                <a class="btn btn-info" href="{{ url('/movies/'.$movie->id ) }}">Show</a>
                <a class="btn btn-primary" href="{{ url('/movies/'.$movie->id.'/edit' ) }}">Edit</a>
                <p>
                <form action="{{ url('/movies/'.$movie->id ) }}" method="POST">
                 {{ method_field('DELETE') }}
                 <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                 <input type="submit" class="btn btn-danger" value="Delete">
                </form>
                </p>
                </td>
        </tr>
        @endforeach
        </table>
      
    @endsection