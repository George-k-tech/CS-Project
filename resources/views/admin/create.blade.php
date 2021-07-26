<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

   
   <div class="container">
  <div class="jumbotron">
  </div>
 <div class="panel panel-success">
      <div class="panel-heading">
      	Create New User
      </div>
      <div class="panel-body">
      	@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
	 	 <form action="{{ route('admin.store') }}" method="post">
	 	 	{{ csrf_field() }}
			  <div class="row">
			  	<div class="col-md-8">
			  	<div class="form-group">
				    <label for="roll">User Name <span class="required">*</span></label>
				    <input type="text" class="form-control" placeholder="User Name" name="name" id="name">
				 </div>
			  	</div>
			  	<div class="col-md-6">
			  	<div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" class="form-control" placeholder="Email" name="email" id="email">
				 </div>
			  	</div>
			        <div class="col-md-12">
			  	<div class="form-group">
				    <label for="password">password</label>
				    <input type="password" class="form-control" placeholder="password" name="password" id="password">
				 </div>
			  	</div>
			  </div>
			  <button type="submit" class="btn btn-primary">Add</button>
			  <a href="{{ route('admin.index') }}" class="btn btn-danger">Back</a>
			</form> 
   	  </div>
    </div>
</div>
 
 </x-app-layout>