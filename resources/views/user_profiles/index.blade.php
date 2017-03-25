@extends('cinema.home')
@section('title','My Profile')
@section('content')

<div class="content">
<?php 
$registered_now = session('registered_now');
if($registered_now == 1){
    echo " <div class='alert alert-success'>
               <center><p>Успешно се регистрирахте !</p></center> 
            </div>";
}else{

}

// var_dump($movies);
// $new = $movies->unique();
// var_dump($new)
?>
<div class="">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="photo" src="{{url('/users/'.$user->name.'/'.$user->photo)}}">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
             @if(empty($user->photo))
           <p><br><a href="{{ url('/profile/'.$user->id.'/edit' ) }}"> <img src="../images/user.png" alt="profile_pic"></a></p>
          @else
           <p><br> <a href="{{ url('/profile/'.$user->id.'/edit' ) }}"><img src="{{url('/users/'.$user->name.'/'.$user->photo)}}" alt="profile_pic"></a></p>
           @endif
           
        </div>
        <div class="card-info"> <span class="card-title">{{$user->name}}</span>
        

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-warning" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Прожекции</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Запазени филми</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Информация</div>
            </button>
        </div>
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <h3>Запазвани Прожекции</h3>
         <table class="table table-striped">
          <thead>
                    <tr>
                        <th>Филм :</th>
                        <th>Дата</th>
                        <th>Ред / Място</th>
                        <th>Час</th>
                        <th>Цена</th>                       
                        <th>Код за Резервацията</th>
                    </tr>
            </thead>
                <tbody>
        <?php $a = 0; $b=0;?> 
        @foreach($sold as $value)
        
        @if(date('Y-m-d') == $value->cmSold->date)
        <tr style="border:#F00 2px solid;background-color: #d3d3d3;">
        @else
        <tr>
        @endif
    
       @foreach($movies as $movie)
         @if($movie->id == $value->cmSold->cm_movie_id)
         <td><p>{{$movie->title}}</p></td>
         @endif
       @endforeach
           

            <td><p>{{$value->cmSold->date}}</p></td>
            <td><p>Ред: {{$value->row_num}} / Място: {{$value->column_num}}</p></td>  
            <td><p>{{substr($value->cmSold->hour,0,5)}}</p></td>
            <td><p>{{$value->price}} лв.</p></td>
            <td><p><strong> {{$value->code}}</strong> </p></td>
       <?php $a += $value->price; $b++ ?>
          </tr>
       
        @endforeach 
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>общо разход: {{$a}} лв.</strong></td>
        <td><strong>общо билети : {{$b}}</strong></td>
        </tr>
        </tbody>
        </table>
       <span style="color:#F00;">*в червено очертание се показват прожекциите който са за днес</span> 
        </div>

        
        <div class="tab-pane fade in" id="tab2">
          <h3>Запазени Филми </h3>
        </div>
        <div class="tab-pane fade in" id="tab3">
        <center>
          <h3>Информация</h3>
          @if(empty($user->photo))
           <p>Снимка :<br> <img src="../images/user.png" width="200px" height="200px" alt="profile_pic"></p>
          @else
           <p>Снимка :<br> <img src="{{url('/users/'.$user->name.'/'.$user->photo)}}" width="200px" height="200px" alt="profile_pic"></p>
           @endif
           <p>Потребителско име : {{$user->name}}</p>
          
           <p>Поща : {{$user->email}}</p>
           <a class="btn btn-primary" href="{{ url('/profile/'.$user->id.'/edit' ) }}">Промени</a>
         </center>
        </div>
      </div>
    </div>
    
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-warning").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-warning");   
});
});
    </script>
    </div>
 
@endsection

            
    