
<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('users') }}">user Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('users') }}">View All users</a></li>
        <li><a href="{{ URL::to('users/create') }}">Create a user</a>
    </ul>
</nav>

<h1>All the users</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            
           
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
          
           

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the user (uses the destroy method DESTROY /users/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the user (uses the show method found at GET /users/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}">Show this user</a>

                <!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit this user</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
         <td>ID</td>
            <td>title </td>
            <td>description</td>
            <td>director</td>
            <td>translation</td>
            <td>age_rate</td>
        </tr>
    </thead>
    <tbody>
    @foreach($movies as $key => $value)
        <tr>
         <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->director }}</td>
            <td>{{ $value->translation }}</td>
             <td>{{ $value->age_rate }}</td>
           

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the user (uses the destroy method DESTROY /users/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the user (uses the show method found at GET /users/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}">Show this movie</a>

                <!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit this movie</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
