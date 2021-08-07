<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Total payment for the Ticket') }}
        </h2>
    </x-slot>

<form method="POST" action="{{ route('pay') }}" id="paymentForm">

Name:{{ $data->name}} <br>
Phone: {{ $data->phone}} <br>
E-mail: {{ $data->email}}<br>
Pieces of clothes : {{ $data->pieces}} <br>
Total Amount: {{ $data->total}} 
<br> 
<a name="" id="" class="btn btn-primary" href="{{ route('pay') }}" role="button">Pay Now</a>
<a name="" id="" class="btn btn-primary" href="{{ route('dashboard.index') }}" role="button">Back</a>
</form>

 </x-app-layout>
