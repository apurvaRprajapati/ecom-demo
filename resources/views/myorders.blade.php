@extends('master')
@section('content')
<div class="custom-product">
	<div class="col-sm-10">
		<div class="product-wrapper">
			<h4>My orders</h4>
			@foreach($orders as $item)
				<div class="row cart-list-divider">
					<div class="col-sm-3">
						<a href="detail/{{$item->id}}">
							<img class="trending-image" src="{{$item->image}}">
						</a>
					</div>
					<div class="col-sm-3">
						
							<div>
								<h5>name: {{$item->name}}</h5>
								<h6 style="color:#e24111;">Delivery Status: {{$item->status}}</h6>
								<label>Address: {{$item->address}}</label>
								<label>Payment Method: {{$item->payment_method}}</label>
							</div>
						
					</div>
				</div>
			@endforeach
			
		</div>
	</div>	
</div>
@endsection