@extends('master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<img src="{{$product->image}}" alt="" style="height: 200px;">
		</div>
		<div class="col-sm-6">
			<a href="/"> Go back</a>
			<h2>{{$product->name}}</h2>
			<h5>price: {{$product->price}}</h5>
			<h5>description: {{$product->description}}</h5>
			<br/>

			<form action="/add_to_cart" method="POST">
				@csrf
				<input type="hidden" name="product_id" value="{{$product->id}}">
				<button type="submit" class="btn btn-primary"> Add to cart</button>	
			</form>
			

		</div>
	</div>	
</div>

@endsection