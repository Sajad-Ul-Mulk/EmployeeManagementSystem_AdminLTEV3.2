<?php

namespace App\Http\Controllers;

use App\Events\TaskApprovalCreationEvent;
use App\Http\Requests\ChangeStausChangeFormRequest;
use App\Models\Task;
use App\Models\TaskApproval;
use Auth;
use Illuminate\Http\Request;

class ChangeStausController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        \Gate::allows('view-approvals',Auth::user());
        return view('change-status.index',[
            'approvals'=>TaskApproval::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Task $task)
    {
        return view('change-status.create',[
            'task'=> $task
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChangeStausChangeFormRequest $request, Task $task)
    {
        $validated = $request->validated();
        $validated['task_id'] = $task->id;
        $validated['user_id'] = Auth::id();

        $task_approval_entry=TaskApproval::create($validated);
;
        if($task_approval_entry) {
            TaskApprovalCreationEvent::dispatch($task_approval_entry,$task);
            return redirect()->route('tasks.index')->with('success', 'Approval Submitted');
        }
        return redirect()->back(404);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (TaskApproval::findOrFail($id)->delete())
            return redirect()->to('approvals')->with('success','Approval Declined Successfully.');

        return redirect()->back(404);
    }
}
