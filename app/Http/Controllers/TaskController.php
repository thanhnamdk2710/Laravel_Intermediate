<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    protected $tasks;

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    public function index(Request $request)
    {
        $tasks = $this->tasks->forUser($request->user());

        return view('tasks', ['tasks' => $tasks]);
    }

    public function create()
    {
        //
    }

    public function store(TaskRequest $request)
    {
        try {
            $request->user()->tasks()->create([
                'name' => $request->name,
            ]);

            return redirect()->route('tasks.index')->with('success', trans('lang.create_success'));
        } catch (Exception $e) {
            return redirect()->route('tasks.index')->with('error', trans('lang.create_error'));
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();

        if ($task->delete()) {
            return redirect()->route('tasks.index')->with('success', trans('lang.delete_success'));
        } else {
            return redirect()->route('tasks.index')->with('error', trans('lang.delete_error'));
        }
    }
}
