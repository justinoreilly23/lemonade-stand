@extends('layouts.master')

@section('content')

  <p >Day {{ session('day') }} results</p >

  <table class="table" >
    <tr >
      <th >Wallet</th >
      <th >Customers</th >
      <th >Remaining mix</th >
      <th >Remaining cups</th >
    </tr >
    <tr >
      <td >{{ session('money') }}</td >
      <td >{{ $customers = count(session('customers')) }}</td >
      <td >{{ session('mix') }}</td >
      <td >{{ session('cups') }}</td >
    </tr >
  </table >

  <a href="/buy" ></a >

@endsection