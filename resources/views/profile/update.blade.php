{{-- @if ($tasks->count()>0)
<ul>
    @foreach($tasks as $task)
    <li>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST" style="display: inline;">
    

            @csrf
            @method('PUT')
            
            <input type="text" name="" id="" placeholder="{{$task->description}}">
            {{-- <button type="submit" {{$task->is_complete ? 'disabled' : ''}}>Mark as complete</button> --}}
        </form>
{{-- 
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
      
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form> --}}
    </li>
    @endforeach
</ul>

@else
    <h1>no tasks</h1>
@endif --}}