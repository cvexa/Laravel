@extends('cinema.home')
@section('title','Edit')


@section('content')

 <div class="row">

        <div class="col-lg-12 margin-tb">

           

                <center><h2>Промени Информация за профил -  {{ $user->name }}</h2></center>

           

 @if ($message = Session::get('success'))
            <div class="alert alert-success">
               <center><p>{{ $message }}</p></center> 
            </div>
        @endif


  <form action="{{ url('/profile/'.$user->id) }}" method="post" id="edit" enctype="multipart/form-data" files="true">
   {{ method_field('PUT') }}


    <div class="form-group">
      <label for="Title">Потребителско име  </label>
        <p>
        <input id="title" type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="new name...">
        </p>
    </div>

    <div class="form-group">
      <label for="photo">Снимка </label>
        <center><p>
         @if(empty($user->photo))
           <p><br> <img src="{{url('/images/user.png')}}" width="200px" height="200px" alt="profile_pic"></p>
          @else
           <p><br> <img src="{{url('/users/'.$user->name.'/'.$user->photo)}}" width="200px" height="200px" alt="profile_pic"></p>
           @endif
        <input id="photo" type="file" name="photo">
        </p></center>
    </div>

    <!--  <div class="form-group">
      <label for="Title">Парола  </label>
        <p>
        <input id="title" type="text" class="form-control" name="password" value="{{ $user->password }}" placeholder="new password...">
        </p>
    </div> -->

    <div class="form-group">
      <label for="Title">Поща: {{ $user->email }} </label>
        <p>
        <input id="title" type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="new email...">
        </p>
    </div>






    

    <div class="form-group">
      <p><input name="_token" type="hidden" value="{{ csrf_token() }}"/></p>
    </div>

    <input type="submit" class="btn btn-info" value="Промени">


</form>
 <center><a class="btn btn-primary" href="{{ url('/profile/'.$user->id ) }}">Назад</a></center><br>
</div>
</div>
@endsection
