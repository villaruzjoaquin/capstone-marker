<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Group;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function create()
    {
        $groups = Group::all();
        return view('todos.create', compact('groups'));
    }

    // Store a new to-do in the database
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255',
            'group_id' => 'required|exists:groups,id',
        ]);

        Todo::create($request->all());
        
        return redirect()->route('todos.create')->with('success', 'ToDo added successfully!');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
        return back()->with('success', 'Task completed and deleted successfully.');
    }



}
