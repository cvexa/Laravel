<!-- app/views/users/create.blade.php -->

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

<h1>Create a user</h1>



<form action="{{ action('UserController2@store') }}" method="post">

    <div class="form-group">
      <label for="name">Name</label>
        <input id="name" type="text" name="name" placeholder="name...">
    </div>

    <div class="form-group">
       <label for="email">Email</label>
        <input id="email" type="text" name="email" placeholder="email...">
    </div>
    <div class="form-group">
       <label for="pass">Pass</label>
        <input id="pass" type="password" name="pass" placeholder="password">
    </div>

    <div class="form-group">
      <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    </div>

    <input type="submit" name="submit" value="create">

</form>

</div>
</body>
</html>