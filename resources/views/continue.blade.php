@extends('layouts.master')

@section('content')

  @isset($message)
    {{ $message }}
  @endisset

  <h2 class="card-header-title" >Is this what you want?</h2 >
  <br >
  <div class="w-75 m-auto text-center" >
    <div class="row m-auto w-100">
      <table class="table" >
        <tr >
          <th >Remaining balance</th >
          <th >Mix</th >
          <th >Cups</th >
        </tr >
        <tr >
          <td >${{ session()->get('money') }}</td >
          <td >{{ session()->get('mix') }}</td >
          <td >{{ session()->get('cups') }}</td >
        </tr >
      </table >
    </div >

    <div class="row m-auto w-100" >
      <a href="/buy" class="m-auto w-50">
        <button class="btn btn-secondary">< change</button >
      </a >
      <a href="/simulate" class="m-auto w-50">
        <button class="btn btn-primary">looks good! ></button >
      </a >
    </div >

  </div >

@endsection