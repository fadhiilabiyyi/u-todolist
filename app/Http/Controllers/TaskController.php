<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all()->sortBy('updated_at');

        return view('dashboard.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $rules = [
            'task_name' => 'required',
            'finished' => 'required',
        ];

        $validateRequest = $request->validate($rules);

        Task::create($validateRequest);

        return redirect('/dashboard')->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function update(Request $request)
    {
        $rules = [
            'task_name' => 'required',
            'finished' => 'required',
        ];

        $validateRequest = $request->validate($rules);

        Task::where('id', $request->id)->update($validateRequest, $request->id);

        return redirect('/dashboard')->with('success', 'Tugas berhasil di-update!');
    }
}
