@extends('master')
@section('content')
<div class="container">
	<div class="col-sm-10">
		<table class="table">
		    <tbody>
		       <tr>
		        <th>Amount</th>
		        <th>$ {{$total}}</th>
		      </tr>
		      <tr>
		        <td>Tax</td>
		        <td>$ 0</td>
		      </tr>
		      <tr>
		        <td>Delivery</td>
		        <td>$ 10</td>
		      </tr>
		      <tr>
		        <td>Total Amount</td>
		        <td>$ {{$total + 10}}</td>
		      </tr>
		    </tbody>
  		</table>
  		<div>
  			<form action="/orderplace" method="post">
  				@csrf
			  <div class="form-group">
			    <textarea name="address" class="form-control" placeholder="Enter your address"></textarea> 
			  </div>
			  <div class="form-group">
			    <label for="pwd">Payment Method</label> </br>
			    <input type="radio" value="cash" name="payment" checked> <span>Pay on delivery</span> </br></br>
			  </div>
			  <button type="submit" class="btn btn-primary">Order Now</button>
			</form>
  		</div>
	</div>	
</div>
@endsection