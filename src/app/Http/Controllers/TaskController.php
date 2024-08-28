<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Traits\ExceptionFlash;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    use ExceptionFlash;

    /**
     * @var string[]
     */
    private $rules = [
        'task_name' => 'required|string|max:255',
    ];

    /**
     * @var string[]
     */
    private $messages = [
        'task_name.required' => 'A task name is required when creating a task.',
        'task_name.string' => 'The task name must be a string.',
        'task_name.max' => 'The task name has a maximum length of 255 characters.',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\View\View
    {
        // Paginates the tasks, as image having 20,000!
       $tasks = Task::query()
       ->orderBy('created_at','ASC')
       ->paginate(10);
       return view('index')->with('tasks',$tasks);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate($this->rules,$this->messages);

        $this->tryWithFlash(function() use ($request){
                Task::create(['task_name' => $request->input('task_name')]);
                $request->session()->flash('status',['type' => 'success', 'message' =>  'Task was created!']);
        }, $request, 'unable to delete task');

        return redirect()->route('tasks.index');

    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function complete(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $this->tryWithFlash(function() use ($request,$id){
                if (Task::where('id', $id)->exists()) {
                    $task = Task::findOrFail($id);
                    $task->completed_at = now();
                    $task->save();
                    $request->session()->flash('status', ['type' => 'success', 'message' => 'Task completed!']);
                } else {
                    $request->session()->flash('status', ['type' => 'danger', 'message' => 'Unable to delete task']);
                }
            }, $request, 'unable to delete task');

        return redirect()->route('tasks.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id): \Illuminate\Http\RedirectResponse
    {
        $this->tryWithFlash(function() use ($request,$id){
            if(Task::where('id',$id)->exists()) {
                $task = Task::findOrFail($id);
                $task->delete();
                $request->session()->flash('status',['type' => 'success', 'message' =>  'Task removed!']);
            }else {
                $request->session()->flash('status',['type' => 'danger', 'message' =>  'Unable to delete task']);
            }
        }, $request, 'unable to delete task');

        return redirect()->route('tasks.index');
    }
}
