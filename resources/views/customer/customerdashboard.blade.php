 @extends('layouts.customerlayout.customer')
 @section('content')
    <div class="card">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Image</th>
                <th scope="col">Video</th><th></th>
                <th scope="col">Oreder Assign</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
             @php
            $sn=1;
            $customerId = Auth::user()->id;
            @endphp
            @if(!$customer->isEmpty())
            @foreach($customer as $customer_data)
            @if($customer_data->customer_id==$customerId)
            <tbody>
              <tr>
                <th scope="row">{{$sn++}}</th>
                <th><img src="{{ asset($customer_data->logo)}}" alt="Image"/ width="50px" height="50px"></th>
                
                <th>
                    <video width="100" height="100" controls>
                      <source src="{{ asset($customer_data->employe_video)}}" type="video/mp4">
                    Your browser does not support the video tag.
                    </video>
                </th>
                <th></th>
                <th>{{$customer_data->order_assign_time}}</th>
                <th>
                    <a class="btn btn-sm btn-primary" href="#"> Edit</a>

                    <a class="btn btn-sm btn-danger" href="{{ url('video/download',$customer_data->customer_id) }}"> Download Video</a>    
                </th>
              </tr>
            @endif
            @endforeach
            @endif
            
            </tbody>
          </table>
    </div>
    <!-- Large modal -->
</div>
@endsection