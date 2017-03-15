    @extends('cinema.home')
    @section('title','All movies')
    @section('content')
    <div class="banner-bottom">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Movies CRUD</h2>
                </div>
                 <!-- <div class="pull-right">
                    <p><a class="btn btn-success" href="{{ url('logout') }}"> LOGOUT</a></p>
                </div> -->
                <div class="pull-right">
                    <p><a class="btn btn-success" href="{{ url('movies/create') }}"> Добави Нов Филм</a></p>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Име</th>
                <th>Описание</th>
                <!-- <th>Прожекции дата/час</th> -->
                
                <th>Премиера</th>
                <th>Рейтинг (1-10)</th>
                <th width="280px">Операции</th>
            </tr>
          
        @foreach ($movies as $movie)
        
        <tr>
            <td>{{ $movie->id }}</td>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->description }}</td>
            <!-- <td> -->
         <!--    @foreach($movie->movieScreenings as $screen)
            |{{$screen->date }},
            <a href="">{{substr($screen->hour,0,5)}}</a>|<br>
            
            @endforeach
            </td> -->
            <td>{{ $movie->bg_premiere }}</td>
            <td>{{ $movie->rating }}</td>
        

            <td>
                <a class="btn btn-info" href="{{ url('/movies/'.$movie->id ) }}">Покажи още</a>
                <a class="btn btn-primary" href="{{ url('/movies/'.$movie->id.'/edit' ) }}">Промени</a>
                <p>
                <form action="{{ url('/movies/'.$movie->id ) }}" method="POST" onsubmit="return ConfirmDelete()">
                 {{ method_field('DELETE') }}
                 <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                 <p><input type="submit" class="btn btn-danger" value="Изтрии"></p>
                </form>
                </p>
                </td>
        </tr>
      
        @endforeach
        </table>
        <script>

          function ConfirmDelete()
          {
              var x = confirm("Сигруни ли сте че искате да изтриете ?");
              if (x)
                return true;
            else
                return false;
        }

    </script>
    </div>
    @endsection