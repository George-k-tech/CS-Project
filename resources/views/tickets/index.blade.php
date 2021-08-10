<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payments') }}
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
	  <br>
      <div class="panel-body flex flex-col">
	  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
	  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
	  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
	 	<table class="table table-hover table-bordered table-stripped min-w-full divide-y divide-gray-200" >
	 		<thead class="bg-gray-50">
	 			<tr>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID _Number</th>
	 			<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
	 			<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
	 			<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transaction Reference</th>
	 			</tr>
	 		</thead>
	 		<tbody class="bg-white divide-y divide-gray-200">
	 		    @foreach ($payments as $payment)
	 			<tr>
	 			<td scope="col" class="px-6 py-3 text-sm text-black-500">{{ $loop->index+1 }}</td>
	 			<td scope="col" class="px-6 py-3 text-sm text-black-500">{{ $payment->email}}</td>
	 			<td scope="col" class="px-6 py-3 text-sm text-black-500">{{ $payment->amount }}</td>
	 			<td scope="col" class="px-6 py-3 text-sm text-black-500">{{ $payment->tx_ref}}</td>
	 			<td>
	 		</td>
	 		</tr>
	 		@endforeach
	 		</tbody>
	 	</table>
	 	<p class="pull-right">
	 	{{ $payments->links() }}
	 	</p>
   	  </div>
    </div>
</div>

</x-app-layout>
