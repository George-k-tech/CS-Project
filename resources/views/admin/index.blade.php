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
	<a href="{{route('admin.create')}}" data-toggle="modal" data-target="#addModal" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus"></i> Add New</a>
      </div>
	  <br>
      <div class="panel-body flex flex-col">
	  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
	  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
	  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
	 	<table class="table table-hover table-bordered table-stripped min-w-full divide-y divide-gray-200" >
	 		<thead class="bg-gray-50">
	 			<tr>
	 			<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">S.N</th>
	 			<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
	 			<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
	 			<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">phone Number</th>
	 			<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"><br><br>Action</th>
	 			</tr>
	 		</thead>
	 		<tbody class="bg-white divide-y divide-gray-200">
	 		    @foreach ($users as $user)
	 			<tr>
	 			<td scope="col" class="px-6 py-3 text-sm text-black-500">{{ $loop->index+1 }}</td>
	 			<td scope="col" class="px-6 py-3 text-sm text-black-500">{{ $user->name }}</td>
	 			<td scope="col" class="px-6 py-3 text-sm text-black-500">{{ $user->email }}</td>
	 			<td scope="col" class="px-6 py-3 text-sm text-black-500">{{ $user->phone}}</td>
	 			<td>
	 		<form  method="post" action="{{ route('admin.destroy',$user->id) }}" class="delete_form">
                	        {{ csrf_field() }}
                		{{ method_field('DELETE') }}
						<td scope="col" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"><a href="{{ route('admin.edit',$user->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a></td>

                        <td scope="col" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"><button class="bg-red-600 hover:bg-red-900 text-white font-bold py-2 px-4 rounded" type="submit" onclick="return confirm('Are You Sure? Want to Delete It.');">Delete</button></td>
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
