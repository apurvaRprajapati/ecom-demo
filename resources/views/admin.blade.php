@extends('admin_master')
@section('content')
<div class="custom-product">
	<div class="col-sm-10">
		<div class="product-wrapper">
			<h4>All orders</h4>
			@foreach($orders as $item)
				<div class="row cart-list-divider">
					<div class="col-sm-3">
						<img class="trending-image" src="{{$item['image']}}">
					</div>
					<div class="col-sm-3">
							<div>
								<h5>name: {{$item['name']}}</h5>
								<h6>Address: {{$item['address']}}</h6>
								<h6>Payment Status: {{$item['payment_status']}}</h6>
								<h6>Payment Method: {{$item['payment_method']}}</h6>
								
									<h6>Delivery Status: </h6>
									<div class="row">
										<form action="/update_order_status" method="POST">
											@csrf
											<div class="col-sm-4" style="padding: 10px;margin-right: 30px;">
												<select name="status" id="status">
													@foreach($order_status as $val)	
													<option value="{{$val}}" {{($item['status'] == $val) ? "selected" : '' }}>{{$val}}</option>
													@endforeach
												</select>
											</div>
											<div class="col-sm-4" style="padding: 10px;margin-right: 10px;">
												<input type="hidden" name="order_id" value="{{$item['id']}}">
												<input type="hidden" name="product_id" value="{{$item['product_id']}}">
												<button type="submit" class="btn btn-success">Save</button>
											</div>
										</form>
									
								</div>
								

								
							</div>
						
					</div>
				</div>
			@endforeach
			
		</div>
	</div>	
</div>
@endsection