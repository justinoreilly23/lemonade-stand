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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css" >
</head >

<style >
  #myProgress
  {
    width            : 50%;
    background-color : #ddd;
  }

  #myBar
  {
    width       : 10%;
    height      : 30px;
    text-align  : center;
    line-height : 30px;
    color       : white;
  }
</style >
<body >

<div class="text-center">
  <br >
  <br >
  <br >
  <br >
  <br >
  <br >
  <br >
  <br >
  <br >
  <br >
  <h3 class="mb-5" >Loading</h3 >
  <div class="is-6 mt-5" >
    <div id="myProgress" class="is-6 m-auto" style="top:0;bottom:0;left:0;right:0; height:5%;" >
      <div id="myBar" class="bg-info" >10%</div >
    </div >
  </div >
</div >


<script >

  var elem  = document.getElementById("myBar");
  var width = 10;
  var id    = setInterval(frame, 10);

  function frame()
  {
    if (width >= 100) {
      clearInterval(id);
      window.location.href = "/results";
    }
    else {
      width++;
      elem.style.width = width + '%';
      elem.innerHTML   = width * 1 + '%';
    }
  }
</script >

</body >
</html >
