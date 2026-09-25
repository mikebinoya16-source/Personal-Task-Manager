<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return response('', 303)->header('Location', '/tasks');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->task_name = $request->task_name;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->due_date = $request->due_date;

        $task->save();

        return response('', 303)->header('Location', '/tasks');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return response('', 303)->header('Location', '/tasks');
    }
}