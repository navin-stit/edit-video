 @extends('layouts.partials.header')
 @section('content')
 @if(Session::has('msg'))
       <label class="alert-danger">{{session('msg')}}</label>
     @endif
      
     <table class="table">
      <tr>
      <th>Sn.No</th>
      <th>Name</th>
      <th>Address</th>
      <th>Description</th>
      <th>Updated_at</th>
      <th>Created_at</th>
      <th>Action</th>
    </tr>
    @php
    $sn=1;
    @endphp
    @foreach($customer as $customer_data)
     <tr>
        <td>{{$sn}}</td>
        <td>{{$customer_data->name}}</td>
        <td>{{$customer_data->address}}</td>
        <td>{{$customer_data->description}}%</td>
        <td>{{$customer_data->updated_at}}</td>
        <td>{{$customer_data->created_at}}</td>
        <td>
         <a href="{{url('/customer/edit/'.$customer_data->id)}}" class="btn btn-success">Edit</a>
          <a href="{{url('/customer/delete/'.$customer_data->id)}}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
    @php
    $sn++;
    @endphp
    @endforeach
  </tr>
 </table>
 @endsection
