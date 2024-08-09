<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\ApiTask;
use Illuminate\Http\Request;

class IsCompletedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,ApiTask $task)
    {
        $task->is_completed=$request->is_completed;
        $task->save();
        return TaskResource::make($task);
    }
}
