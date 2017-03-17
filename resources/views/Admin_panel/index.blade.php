@extends('cinema.home')
@section('title','Admin panel')
@section('content')

<center><p id="a_h1"><h1>Здравейте, Изберете опция:</h1></p></center>

<div id="admin_menu">
<div id="animated_area1"><div id="movies"><a href="{{url('/movies')}}"><button class="hvr-float-shadow">Администрация ФИЛМИ</button></a></div></div>
<div id="animated_area2"><div id="screenings"><a href="{{url('/screenings')}}"><button class="hvr-float-shadow">Администрация ПРОЖЕКЦИИ</button></a></div></div>
<div id="code"><a href="{{url('/admin/codes')}}"><button class="hvr-float-shadow">Администрация Кодове</button></a></div>
</div>



@endsection