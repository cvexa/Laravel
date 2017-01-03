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

<h1>Delete a user <p>{{ $user->name }}</p></h1>

<a class="btn btn-small btn-success" href="{{ URL::to('users/' . $user->id. '/delete') }}">yess</a>
<a class="btn btn-small btn-warning" href="{{ URL::to('users/') }}">no</a>




</div>
</body>
</html>