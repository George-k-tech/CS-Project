<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buy Ticket') }}
        </h2>
    </x-slot>

   <form action="{{  route('pay')  }}" method="post">
   @csrf
Name: <input type="text" name="name"><br>
Phone: <input type = "phone" name = "phone"> <br>
E-mail: <input type="text" name="email"><br>
Pieces of clothes : <input type ="number" name ="pieces" step ="1"> <br>
<input type="submit">
</form>

 </x-app-layout>