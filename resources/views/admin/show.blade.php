@extends('crud.main')
   
@section('main-content')
   
   <div class="container">
  <div class="jumbotron">
  </div>
 <div class="panel panel-success">
      <div class="panel-heading">
      	View Users Details
      </div>
      <div class="panel-body">
			  <div class="row">
			  	<div class="col-md-8">
			  	<div class="form-group">
				    <label for="roll">Users Name</label>
				    <input type="text" disabled value="{{ $user->name }}" class="form-control" placeholder="User name" name="name" id="name">
				 </div>
			  	</div>
			  	<div class="col-md-6">
			  	<div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" disabled value="{{ $email->email }}" class="form-control" placeholder="Email" name="email" id="email">
				 </div>
			  	</div>
			        <div class="col-md-12">
			  	<div class="form-group">
				    <label for="address">password</label>
				    <input type="password" disabled value="{{ $user->password }}" class="form-control" placeholder="password" name="password" id="password">
				 </div>
			  	</div>
			  </div>
			  <a href="{{ route('crud.admin.index') }}" class="btn btn-danger">Back</a>
   	  </div>
    </div>
</div>
    
@endsection