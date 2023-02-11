<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display task maintenance page with list of all tasks
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request) :View
    {
        $tasks = Task::get();

        return view('tasks', compact('tasks'));
    }

    /**
     * Add a new task
     *
     * @param \Illuminate\Http\Request $request
     * @param string $name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TaskStoreRequest $request) :RedirectResponse
    {
        $task = Task::create([
            'name' => $request->name
        ]);
  
        return redirect()->back()->withSuccess('Task created successfully');
    }
  
    /**
     * Soft delete task
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function complete(Request $request, Task $task) :RedirectResponse
    {
        if($task and !$task->complete) {
            $task->complete = true;
            $task->save();
        }
  
        return redirect()->back()->withSuccess('Task set as completed');
    }
  
    /**
     * Soft delete task
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Task $task) :RedirectResponse
    {
        if($task and !$task->trashed()) {
            $task->delete();
        }
  
        return redirect()->back()->withSuccess('Task deleted');
    }
}
