<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showAvailableTasks()
    {
        return view('index',[
            'total_tasks'=> Task::latest()->with('user')->count()
        ]);
    }
}
