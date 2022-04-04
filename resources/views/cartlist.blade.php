@extends('master')
@section('content')
<div class="custom-product">
	<div class="col-sm-10">
		<div class="product-wrapper">
			<h4>Result for Products</h4>
			@if(count($products) > 0)
			<a class="btn btn-success" href="ordernow">Order Now</a> 
			@endif
			<br><br>
			@foreach($products as $item)
				<div class="row cart-list-divider">
					<div class="col-sm-3">
						<a href="detail/{{$item->id}}">
							<img class="trending-image" src="{{$item->image}}">
						</a>
					</div>
					<div class="col-sm-3">
						
							<div>
								<h5>{{$item->name}}</h5>
								<h6>{{$item->description}}</h6>
							</div>
						
					</div>
					<div class="col-sm-3">
						<a href="/removecart/{{$item->cart_id}}" class="btn btn-warning"> Remove from cart</a>
					</div>
				</div>
			@endforeach
			@if(count($products) > 0)
			<a class="btn btn-success" href="ordernow">Order Now</a>
			@endif <br><br>
		</div>
	</div>	
</div>
@endsection