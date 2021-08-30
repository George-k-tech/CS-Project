   <x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>
	<html>
        <head>
    <style>
            .card {
                position: relative;
                width: 350px;
                height: 450px;
                margin: 30px;
                box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
                border-radius: 15px;
                background: rgba(255, 255, 255, 0.1);
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
                border-top: 1px solid rgba(255, 255, 255, 0.5);
                border-left: 1px solid rgba(255, 255, 255, 0.5);
                backdrop-filter: blur(5px);
                margin:auto;
                margin-top:10px;
            }
            
        </style>
    </head>
	<body>

   <div class="container">
  <div class="jumbotron">
  </div>
 <div class="panel panel-success">
      
      <div class="panel-heading">
      	Edit User
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
			<div class="card">
	 	 <form action="{{ route('admin.update',$user->id) }}" method="post">
	 	 	{{ csrf_field() }}
	 	 	{{ method_field('PATCH') }}
			<h2 class="text-lg text-black-700 text-center">
      			Edit User
		</h2>
			  <div class="row">
			  	<div class="col-md-8">
			  	<div class="form-group">
					  <div class="mt-4">
				    <label for="roll" class="block font-medium text-sm text-gray-700">User Name</label>
				    <input type="text" value="{{ $user->name }}" class="form-control" placeholder="User Name" name="name" id="name">
					</div>
				</div>
			  	</div>
			  	<div class="col-md-6">
			  	<div class="form-group">
					  <div class="mt-4">
				    <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
				    <input type="email" value="{{ $user->email }}" class="form-control" placeholder="Email" name="email" id="email">
					</div>
					</div>
			  	</div>
			        <div class="col-md-12">
			  	<div class="form-group">
					  <div class="mt-4">
				    <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
				    <input type="password" value="{{ $user->address }}" class="form-control" placeholder="Password" name="password" id="password">
					</div>
				</div>
			  	</div>
			  </div>
			  <x-button type="submit" class="mt-4 ml-4 mr-4">Update</x-button>
			  <a href="{{ route('admin.index') }}" class="btn btn-danger">Back</a>
			</form> 
		</div>
   	  </div>
    </div>
</div>
    </html>
</x-app-layout>