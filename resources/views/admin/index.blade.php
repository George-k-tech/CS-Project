<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
   <div class="container">
  <div class="jumbotron">
  </div>
     @if(Session::has('success'))
     <p class="alert alert-success">{{ Session::get('success') }}</p>
     @endif
 <div class="panel panel-primary" style="margin:5%;">
 <br>
      <div class="panel-heading">
	<a href="{{ route('admin.create') }}" data-toggle="modal" data-target="#addModal" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus"></i> Add New</a>
      </div>
	  <br>
      <div class="panel-body">
	 	<table class="table table-hover table-bordered table-stripped" >
	 		<thead>
	 			<tr>
	 			<th>S.N</th>
	 			<th>Name</th>
	 			<th>Email</th>
	 			<th>password</th>
	 			<th style="width:200px;">Action</th>
	 			</tr>
	 		</thead>
	 		<tbody>
	 		    @foreach ($users as $user)
	 			<tr>
	 			<td>{{ $loop->index+1 }}</td>
	 			<td>{{ $user->name }}</td>
	 			<td>{{ $user->email }}</td>
	 			<td>{{ $user->password}}</td>
	 			<td>
	 		<form  method="post" action="{{ route('admin.destroy',$user->id) }}" class="delete_form">
                	        {{ csrf_field() }}
                		{{ method_field('DELETE') }}
                		<a href="{{ route('admin.edit',$user->id) }}" class="btn btn-xs btn-primary">Edit</a>
                		
	 			<a href="{{ route('admin.show',$user->id) }}" class="btn btn-xs btn-success">View</a>

                        <button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Are You Sure? Want to Delete It.');">Delete</button>
                	</form>
	 		</td>
	 		</tr>
	 		@endforeach
	 		</tbody>
	 	</table>
	 	<p class="pull-right">
	 	{{ $users->links() }}
	 	</p>
   	  </div>
    </div>
</div>

</x-app-layout>
