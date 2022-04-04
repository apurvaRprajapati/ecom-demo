@extends('master')
@section('content')
<div class="container custom-login">
	<div class="row">
		<div class="col-sm-12 d-flex justify-content-center"> 
			<form action="login" method="post">
			  <div class="mb-3">
			  	@csrf
			    <label for="exampleInputEmail1" class="form-label">Email address</label>
			    <input type="email" name="email" class="form-control"  aria-describedby="emailHelp">
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Password</label>
			    <input type="password" name="password" class="form-control">
			  </div>
			  <button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>
	</div>
</div>

@endsection