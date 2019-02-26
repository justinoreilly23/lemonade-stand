@extends('layouts.master')

@section('content')
  <div class="row mb-4" >
    <h3 >You currently have ${{ session('money') }} to spend on supplies for your lemonade stand</h3 >
  </div >
  <div class="form-group" >
    <p >One packet of lemonade mix serves 3-6 lemonades</p >
    <p >One cup serves 1 lemonade</p >
    <div class="form-row" >

      <form action="{{action('LemonadeStand@setup')}}" method="POST" id="setup" >
        @csrf
        @method('POST')
        <div class="form-row mt-2 m-auto" >
          <div class="columns is-12" >
            <div class="column is-half" >
              <h3 ><label for="requestedMix" class="label" >Mix</label ></h3 >
              <h3 class="text-muted" >{{session('mixPrice')}}/piece</h3 >
              <input type="number" name="requestedMix" title="Mix" class="form-control" value="0" min="0" max="100" >
            </div >
            <div class="column is-half" >
              <h3 ><label for="requestedCups" class="label" >Cups</label ></h3 >
              <h3 class="text-muted" >{{session('cupPrice')}}/piece</h3 >
              <input type="number" name="requestedCups" title="Cups" class="form-control" value="0" min="0" max="100" >
            </div >
          </div >
        </div >
        <div class="form-row m-auto mt-2 w-100" >
          <div class="columns" >
            <div class="column is-12" >
              <h3 ><label for="lemonadePrice" class="label" >Price per cup
                  <span class="text-muted" >(in cents)</span ></label ></h3 >
              <input type="number"
                     name="lemonadePrice"
                     title="Price per lemonade"
                     class="form-control"
                     value="1"
                     min="1"
                     max="100"
                     required >
            </div >
          </div >
        </div >
      </form >
    </div >
    <div class="form-row w-100 mt-4" >
      <a href="/continue" >
        <button type="submit" form="setup" class="btn btn-primary w-100" >Continue</button >
      </a >
    </div >
  </div >
@endsection