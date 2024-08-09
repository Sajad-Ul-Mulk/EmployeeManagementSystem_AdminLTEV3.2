<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApiTaskRequest;
use App\Http\Requests\UpdateApiTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\ApiTask;
use Illuminate\Http\Request;

class TaskControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
    {

        return TaskResource::collection(ApiTask::latest()->with('user')->paginate(5));

//        dd($request->query);
//        if($request->query('includesUsers'))
//            return new TaskResourceCollection(Task::latest()->with('user'));
//
//        return new TaskResourceCollection(Task::latest()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApiTaskRequest $request)
    {
        $task=ApiTask::create($request->validated());
        return \Response::json(['status' => 'success','task'=> new TaskResource($task)], 201,);

    }

    /**
     * Display the specified resource.
     */
    public function show(ApiTask $task)
    {
        $t= TaskResource::make($task->load('user'));
//        $t= TaskResource::make($task->with('user')->get()); load relation with 'with()' ftn if you are paginating. otherwise for single instance use 'load()' ftn

        return $t;
//        return new TaskResource(Task::findorfail($id));
    }



    public function update(UpdateApiTaskRequest $request, ApiTask $task)
    {
        $task_updated=$task->update($request->validated());

        return \Response::json(['status'=>'200','message'=>'User updated Successfully','data'=>TaskResource::make((array)$task_updated)]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApiTask $task)
    {
        $task->delete();
        return response()->noContent();
    }


}
