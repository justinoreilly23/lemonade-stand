<!DOCTYPE html>
<html >
<head >
  <meta charset="UTF-8" >
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" >
  <meta http-equiv="X-UA-Compatible" content="ie=edge" >
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous" >
  <link rel="stylesheet" href="{{asset('css/app.css')}}" >

  <title >Lemonade Stand</title >
</head >
<body class="w-100 m-auto" >
<div class="text-center" >
  <h6 class="text-muted" >go to "/" to start a new game.</h6 >
</div >

@hassection('content')

  @include('partials.inventory')
  <hr >
  <div class="w-75 m-auto jumbotron" >
    @yield('content')
  </div >
@endif
</body >
</html >