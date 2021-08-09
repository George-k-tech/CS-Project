<x-app-layout>

  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       
            {{ __('Dashboard for user') }}
        </h2>
    </x-slot>
    <!--Display success flash message from laravel session flash 
    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
    @endif
    -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex -space-x-2 overflow-hidden">
  <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""/> </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as a user! <br>
                    your name is: {{Auth::user()->name}} <br>
                     your email is: {{Auth::user()->email}} <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>