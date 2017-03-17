    @extends('cinema.home')
    @section('title','All movies')
    @section('content')
    <div class="banner-bottom">
        <div class="row">
            <div class="col-lg-12 margin-tb">
               
                
                    <center><h1>Прожекции</h1></center>

            
                 <!-- <div class="pull-right">
                    <p><a class="btn btn-success" href="{{ url('logout') }}"> LOGOUT</a></p>
                </div> -->
                <div class="pull-right">
                    <p><a class="btn btn-success" href="{{ url('screenings/create') }}"> Добави Нова Прожекция</a></p><br>

                </div>
                <div id="b"><a href="{{url('/admin')}}"><button class="hvr-float-shadow">Назад</button></a></div>
            </div>
        </div>
         <p><i> Вход като Admin : {{session('name')}}</i><br></p>
           <p><span style="color:#F00;">* в червено очертание се показват Филмите които премиери са за днес !</span></p> 
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Дата</th>
                <th>Час</th>
                <!-- <th>Прожекции дата/час</th> -->
                
                <th>Филм</th>
                <th>Цена </th>
                <th>Свободни места </th>
                <th width="280px">Операции</th>
            </tr>
         @foreach($movies as $movie)
         @foreach($movie->movieScreenings as $screen)

         @if(date('Y-m-d') == $screen->date)
        <tr style="border:#F00 2px solid;background-color: #d3d3d3;">
        @else
        <tr>
        @endif
        
            <td>{{ $screen->id }}</td>
            <td>{{ $screen->date }}</td>
            <td>{{ substr($screen->hour,0,5) }}</td>
      
            <td>{{ $movie->title }}</td>
            <td>{{ $screen->price }}</td>
            <td>{{ $screen->free_seats }}</td>
        

            <td>
                <a class="btn btn-info" href="{{ url('/screenings/'.$screen->id  ) }}">Покажи още</a>
                <a class="btn btn-primary" href="{{ url('/screenings/'.$screen->id .'/edit' ) }}">Промени</a>
                <p>
                <form action="{{ url('/screenings/'.$screen->id  ) }}" method="POST" onsubmit="return ConfirmDelete()">
                 {{ method_field('DELETE') }}
                 <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                 <p><input type="submit" class="btn btn-danger" value="Изтрии"></p>
                </form>
                </p>
                </td>
        </tr>
      
        @endforeach
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