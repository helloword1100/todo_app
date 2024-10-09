{{-- <ul>
    @foreach($task as $i)
    <li>
        <form action="{{route('tasks.complete',$i->id)}}" method="POST">
        <form  method="POST">

            @csrf
            @method('PUT')
            <span>
                {{$i->description}} - {{$->due_date}}
            </span>
            <button type="submit" {{$i->is_complete? 'disabled':''}}>Mark as complete</button>
        </form>

        <form action="{{route('tasks.destroy',$i->id)}}" method="POST">
        <form  method="POST">

            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
    @endforeach
</ul> --}}