@extends('cinema.home')
@section('title','Code checking')
@section('content')
<div id="code_content">
<div id="the_content">
@if(empty($_GET['code']))
@if(!empty($alert))
<div class="alert alert-danger">
  <strong>{{$alert}}</strong> 
</div>
@endif
<center><h1 style="margin-bottom: 5%;">Въведи Кода, за да получиш информация !</h1>

<form id="codes" action="{{ url('/admin/codes/check' ) }}">
				{{csrf_field()}}
		<!-- <input type="textarea" name="code"  value="" placeholder="Въведи код ..."> -->
		 <textarea form="codes" class="form-control" rows="5" id="code" name="code" placeholder="Въведи код ..." style="resize: none;"></textarea>
		 <span style="color:#f00"><i>* Внимавайте да няма празно разстояние след или преди кода...</i></span>
	    <input type="submit" name="submit" value="Продължи" class="checkout-button">	
</form>
<p><div id="code"><a href="{{url('/admin')}}"><button class="hvr-float-shadow">Назад</button></a></div></p>
</center>
@elseif($a < 1)


<div class="alert alert-danger">
  <strong>Няма такъв Код в Базата Данни!</strong> 
  <p><div id="code"><a href="{{url('/admin/codes')}}"><button class="hvr-float-shadow">Назад / Намери друг</button></a></div></p>
</div>

@else
@foreach($find as $result)

 <table class="table table-bordered">
            <tr>
                <th>Филм</th>
                <th>Дата</th>
                <th>Час</th>
                <th>Ред</th>
                <th>Място</th>
                <!-- <th>Прожекции дата/час</th> -->
                
                <th><b>Цена</b></th>
                <th>Код </th>
                <th>Потребител</th>

                
                
            </tr>
        

         @if(date('Y-m-d') == $result->date)
        <tr style="border:#F00 2px solid;background-color: #d3d3d3;">
        @else
        <tr>
        @endif
            <td>{{ $movie->cmMovie->title }}</td>
            <td>{{ $movie->date }}</td>
            <td>{{ substr($movie->hour,0,5) }}</td>
            <td style="background-color: #b3b3b3;color:#f00;"><strong>{{ $result->row_num }}</strong></td>
            <td style="background-color: #b3b3b3;color:#f00;"><strong>{{ $result->column_num  }}</strong></td>
            <td style="background-color: #b3b3b3;color:#f00"><b>{{ $result->price }} лв.</b></td>
            <td>{{$result->code}}</td>
            <td>{{$user->name}}</td>
            
            
        

       
      
       
        </table>
@endforeach

<div id="code"><a href="{{url('/admin/codes')}}"><button class="hvr-float-shadow">Назад / Намери друг</button></a></div>
@endif
</div>
</div>


@endsection