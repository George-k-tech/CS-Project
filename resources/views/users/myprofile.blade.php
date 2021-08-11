<x-app-layout>

  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       
            {{ __('Dashboard for user') }}
        </h2>
    </x-slot>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex -space-x-2 overflow-hidden">
            <h2 class="text-lg text-black-700">{{ Auth::user()->name }} 's Profile</h2>
  <!---<img class="inline-block mt-5 h-10 w-10 rounded-full border-radius-5 ring-2 ring-white" src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"alt=""/>    
  <form enctype="multipart/form-data" action="{{ route('dashboard.myprofile', Auth::user()->avatar) }}" method="POST">
  @csrf
  <div class="row">
 
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="avatar" placeholder="Choose image">
                    @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
  
  <x-button type="submit">Submit</x-button>
    </form>--->
    </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as a user! <br>
                    your name is: {{Auth::user()->name}} <br>
                     your email is: {{Auth::user()->email}} <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>