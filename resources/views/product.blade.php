@extends('master')
@section('content')
<div class="custom-product">
	<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
	  <div class="carousel-indicators">
	    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
	    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
	    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
	  </div>
	  <div class="carousel-inner">
	   @foreach($highlight as $item)
	    <div class="carousel-item {{$item->id == 6 ? 'active' : ''}}">
	      <img src="{{$item->image}}" class="d-block w-100" alt="..." style="height: 300px;">
	    </div>
	   @endforeach
	  </div>
	  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Previous</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Next</span>
	  </button>
	</div>

	<div class="product-wrapper">
		<h3>Product list</h3>
		@foreach($products as $item)
			<a href="detail/{{$item->id}}">
		    	<div class="product-item" style="margin-bottom: 30px;margin-top: 25px;margin-left: 25px; margin-right: 25px;">
		      		<img src="{{$item->image}}" class="d-block w-100" alt="..." style="height: 100px;">
		      		<div>
		      			<label>{{$item->name}}</label>
		      		</div>
		    	</div>
	    	</a>
	    @endforeach
	</div>
</div>

@endsection