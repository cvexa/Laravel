@extends('cinema.home')
@section('title','Show more')
@section('content')


    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Информация за прожекция</h2><br>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ url('/screenings') }}"> Назад</a>

            </div>

        </div>

    </div>


 
  

 <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Дата</th>
                <th>Час</th>
                <!-- <th>Прожекции дата/час</th> -->
                
                <th>Филм</th>
                <th>Цена </th>
                <th>Свободни места </th>
               
            </tr>
       
        <tr>
        
          <td>{{ $movies->id }}</td>
    <td>{{ $movies->date }}</td>
    <td>{{ substr($movies->hour,0,5) }}</td>

    <td><b>{{ $movies->cmMovie->title }}</b></td>
    <td>{{ $movies->price }}</td>
    <td>{{ $movies->free_seats }}</td>
     
       
        

          
        </tr>
      
       
        </table>


@endsection