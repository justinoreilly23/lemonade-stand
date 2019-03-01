<div class="w-75 m-auto text-center" >
  <table class="table" >
    <tr >
      <th >Day</th >
      <th >$$$</th >
      <th >Customers</th >
      <th >Mix</th >
      <th >Cups</th >
    </tr >
    <tr >
      <td >{{ session()->get('day') }}</td >
      <td >${{ session()->get('money') }}</td >
      <td >@php $customers = session('customers'); dd($customers); @endphp</td >
      <td >{{ session()->get('mix') }}</td >
      <td >{{ session()->get('cups') }}</td >
    </tr >
  </table >
</div >