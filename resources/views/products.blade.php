<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Auth</title>
</head>
<body>
<div class="container">
    <div class="card-header">
        <h1>Welcome to Product Page </h1>
        <h3> {{Auth::user()->name }} </h3>

        <a href="{{route('logout')}}" class="btn btn-danger float-end">Sign Out</a><br> <br>
  </div>
  <div class="card-body">

  </div>
</div>


</body>
</html>
