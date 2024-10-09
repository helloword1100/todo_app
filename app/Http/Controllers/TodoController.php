<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TodoController extends Controller
{
    //    adding a todo 

    public function add(Request $req)
    {

        $req->validate([
            'description' => 'required|max:255',
            'due_date' => 'required|date|after_or_equal:today'
        ]);
        $userId = Auth::id();
        Task::create(
            [
                'user_id' => $userId,
                'description' => $req->description,
                'due_date' => $req->due_date
            ]
        );

        return redirect()->route('filters.list')->with('success', 'task added ');
    }

    //    updating a todo and passing loged in users data

    public function update_list($id)
    {
        $tasks = Task::where('id', $id)->get();
        return view('update', compact('tasks'));
    }

    //    updating a todo main 

    public function update(Request $r, $id)
    {
        $r->validate([
            'description' => 'required|max:255',
            'due_date' => 'required|date|after_or_equal:today'
        ]);

        $task = Task::findorFail($id);
        $task->update([
            'description' => $r->description,
            'due_date' => $r->due_date,

        ]);




        return redirect()->route('filters.list')->with('success', 'updated');
    }
    //    deleting a todo 


    public function delete_todo($id)
    {
        $todo = Task::find($id);
        if ($todo) {
            $todo->delete();
        }

        return redirect()->back()->with('success', 'deleted');
    }

    //    filtering 

    public function filter(Request $req)
    {
        $filter = $req->query('filter', 'all');
        if ($filter == "pending") {
            $all = Task::where('is_complete', 'no')->get();
        } else if ($filter == "completed") {
            $all = Task::where('is_complete', '1')->get();
        } else {
            $all = Task::all();
        }
        return view('tasks_list', compact('all'));
    }

    //    marking as complete


    public function complete_todo($id)
    {
        $todo = Task::where('id', $id);
        $todo->update(['is_complete' => '1']);

        $updatedTodo = Task::findOrFail($id);
        Log::info($updatedTodo);

        return redirect()->back()->with('success', 'Task successfully marked as done');
    }
}
