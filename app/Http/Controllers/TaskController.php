<?php

namespace App\Http\Controllers;

use App\Events\ApprovalGrantedEvent;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\TaskApproval;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth')->only(['index','show']);
        $this->middleware('can:isAdmin')->except(['index','show']);

    }

    public function index()
    {
//        dd(Task::latest()->TaskToDo()->get());

        return view('task.index', [
           'tasks'=>    task::latest()->TaskToDo()->with('user')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create',[
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $validated=$request->validated();
        $validated['task_approval_id']='0';

        if(Task::create($validated)) {
            return redirect()->route('tasks.index')->with('success', 'Task Created Successfully');
        }

        return  redirect()->route('tasks.create')->with('error','Task Created Failed');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('task.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $users= User::latest()->with('tasks')->get();
        return view('task.edit',[
            'task'=>$task,
            'users'=>$users
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $validated=$request->validated();
        if($task->update($validated))
            return redirect()->route('tasks.index')->with('success','Task Updated Successfully');
        return  redirect()->route('tasks.edit',$task->id)->with('error','Task Updated Failed');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if($task->delete())
            return redirect()->route('tasks.index')->with('success','Task Deleted Successfully');

        return  redirect()->route('tasks.index')->with('error','Task Deleted Failed');
    }

    public function showSpecificStatusTask(string $task_status)
    {
        $tasks=DB::table('tasks')
            ->where('status', $task_status)->paginate(10);

        return view('task.index',[
            'tasks'=>$tasks
        ]);
    }

    public function grantTaskApproval(TaskApproval $approval)
    {

        $approval_requested= $approval->status_approval;
        $task=Task::find($approval->task_id);

        $task->status=$approval_requested;


        if($task->save())
            ApprovalGrantedEvent::dispatch($approval);

        return redirect()->to('approvals')->with('error','Task Approval Failed');


    }
}
