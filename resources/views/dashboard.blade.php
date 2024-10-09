<x-app-layout >
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in! Now you can Manage Your Todo's 😊") }}
                    <x-responsive-nav-link >
                        <x-responsive-nav-link>
                       <p>Start with</p>     <a href="{{ route('todo.form') }}" class="text-xl text-gray-900 bg-transparent  hover:text-gray-500 px-2 py-1 rounded">
                        Adding a new Todo  ➕
                    </a>
                   
                        </x-responsive-nav-link>

                        <x-responsive-nav-link class="pt-4">
                            <p>Or View Your Scheduled Todo's</p>     <a href="{{ route('filters.list') }}" class="text-xl text-gray-900 bg-transparent  hover:text-gray-500 px-2 py-1 rounded">
                            View All Todo's 👀
                         </a>
                         
                             </x-responsive-nav-link>
                        
                
                    </x-responsive-nav-link>
                </div>
               

            </div>
           
        </div>
    </div>
</x-app-layout>

