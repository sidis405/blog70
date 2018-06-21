<?php

namespace App\Http\Controllers;

use App\Task;

class TasksController extends Controller
{
    // lista tutti i task
    public function index()
    {
        $tasks = Task::where('completed', 0)->get(); // where completed = '0'

        return view('welcome', compact('tasks'));
    }

    // mostra task
    // Route - Model Binding
    public function show(Task $task)
    {
        return $task;
    }
}
