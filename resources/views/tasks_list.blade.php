<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .bg-img{
            background-image: linear-gradient(216deg, rgba(77, 77, 77,0.05) 0%, rgba(77, 77, 77,0.05) 25%,rgba(42, 42, 42,0.05) 25%, rgba(42, 42, 42,0.05) 38%,rgba(223, 223, 223,0.05) 38%, rgba(223, 223, 223,0.05) 75%,rgba(36, 36, 36,0.05) 75%, rgba(36, 36, 36,0.05) 100%),linear-gradient(44deg, rgba(128, 128, 128,0.05) 0%, rgba(128, 128, 128,0.05) 34%,rgba(212, 212, 212,0.05) 34%, rgba(212, 212, 212,0.05) 57%,rgba(25, 25, 25,0.05) 57%, rgba(25, 25, 25,0.05) 89%,rgba(135, 135, 135,0.05) 89%, rgba(135, 135, 135,0.05) 100%),linear-gradient(241deg, rgba(55, 55, 55,0.05) 0%, rgba(55, 55, 55,0.05) 14%,rgba(209, 209, 209,0.05) 14%, rgba(209, 209, 209,0.05) 60%,rgba(245, 245, 245,0.05) 60%, rgba(245, 245, 245,0.05) 69%,rgba(164, 164, 164,0.05) 69%, rgba(164, 164, 164,0.05) 100%),linear-gradient(249deg, rgba(248, 248, 248,0.05) 0%, rgba(248, 248, 248,0.05) 32%,rgba(148, 148, 148,0.05) 32%, rgba(148, 148, 148,0.05) 35%,rgba(202, 202, 202,0.05) 35%, rgba(202, 202, 202,0.05) 51%,rgba(181, 181, 181,0.05) 51%, rgba(181, 181, 181,0.05) 100%),linear-gradient(92deg, hsl(214,0%,11%),hsl(214,0%,11%));
        }
    </style>
</head>
<body>
    <div class="flex justify-center items-center bg-img" style="height: 100vh">
       
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            
            <a href="{{route('dashboard')}}">🔙 Back To Dashboard</a>
            <h1 class="text-center p-4 text-xl">Your Scheduled  Todo's 📋</h1>
            <div>
                @if ($all->count() > 0)
                <span class="text-center p-4 ">
                  <form action="{{route('filters.list')}}" method="GET">
                    <select name="filter" id="filter" onchange="this.form.submit()">
                        <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>All Tasks 📌</option>
                        <option value="pending" {{ request('filter') == 'pending' ? 'selected' : '' }}>Pending Tasks ⏳</option>
                        <option value="completed" {{ request('filter') == 'completed' ? 'selected' : '' }}>Completed Tasks 🏆</option>
                    </select>
                  </form>
                </span>
                
                <ul>
                    @foreach($all as $task)
                    <li>
                        <span class="p-4">
                          <div>
                             {{$task->description}} 
                          </div>
                          <div>
                          <span class="flex">
                            <p>Due Till ⏰  </p> <p style="color:red"> {{$task->due_date}}</p>
                          </span>
                          </div>
                           <div class="flex gap-4 pt-2">
                            <span class="border p-2"><a href="{{ route('update.list', $task->id) }}">Update Task ⟳</a></span>
                            <span  class="border p-2"><a href="{{route('delete.todo', $task->id)}}">Delete Task 🗑</a></span>
                            @if ($task->is_complete=='no')
                            <a href="{{route('completed.todo', $task->id)}}" class="border p-2">Mark as Complete ⌛</a>
                            @else
                            <span class="border p-2">Completed ✅</span>
                            @endif
                           </div>
                          
                        </span>
                    </li>
                    @endforeach
                </ul>
                @else
                <span class="text-center p-4 ">
                    <form action="{{route('filters.list')}}" method="GET">
                      <select name="filter" id="filter" onchange="this.form.submit()">
                          <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>All Tasks 📌</option>
                          <option value="pending" {{ request('filter') == 'pending' ? 'selected' : '' }}>Pending Tasks ⏳</option>
                          <option value="completed" {{ request('filter') == 'completed' ? 'selected' : '' }}>Completed Tasks 🏆</option>
                      </select>
                    </form>
                  </span>
                    <h1 class="pt-4 text-center" style="color:green">No tasks found ⚠️</h1>
                @endif
                
            </div>
             </div>
       

    </div>
   
</div>
    </div>
</body>
</html>
