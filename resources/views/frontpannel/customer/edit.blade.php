@extends('layouts.partials.header')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
		{!!Form::open(array('url'=>'customer/update'))!!}
				  <div class="form-group">
				    <label for="email">Name:</label>
				    <input type="text" name="name" class="form-control" id="address" value="{{$customer_data->name}}">

				  </div>
				  <div class="form-group">
				    <label for="address">Address:</label>
				    <input type="text" name="address" class="form-control" id="address" value="{{$customer_data->address}}">
				  </div>
				  <div class="form-group">
				    <label for="description">Description:</label>
				    <input type="text" name="description" class="form-control" id="description" value="{{$customer_data->description}}">
				  </div>
				  <button type="submit" class="btn btn-default">Submit</button>
			{!!Form::close()!!}
			</div>
			<div class="col-sm-4">
		</div>
	</div>
</div>

	
@endsection 