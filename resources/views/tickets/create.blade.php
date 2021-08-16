<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buy Ticket') }}
        </h2>
    </x-slot>

 <x-guest-layout>
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
       <div class="card">
   <form action="{{  route('pay')  }}" method="post" >
       
   @csrf
<div class="mt-4">
    <label class='block font-medium text-sm text-gray-700'>Name: </label><input type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="name">
</div>
<div class="mt-4">
    <label class='block font-medium text-sm text-gray-700'>Phone:</label> <input type="phone" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name = "phone"> 
</div>
<div class="mt-4">
    <label class='block font-medium text-sm text-gray-700'>E-mail:</label> <input type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="email">
</div>
<div class="mt-4">
    <label class='block font-medium text-sm text-gray-700'>Pieces of clothes:</label> <input type="number" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name ="pieces" step ="1">
</div>
<x-button class="mt-4 ml-4 mr-4 ">
                   Pay
                </x-button>
        
</form>
        </div>
        </body>
        </html>
        </x-guest-layout>
 </x-app-layout>