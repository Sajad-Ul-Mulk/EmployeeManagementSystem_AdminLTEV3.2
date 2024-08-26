<?php

namespace App\Listeners;

use App\Events\TaskApprovalCreationEvent;
use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Queue\InteractsWithQueue;

class TaskApprovalCreationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TaskApprovalCreationEvent $event): RedirectResponse
    {
        $event->task->task_approval_id=$event->taskApproval->id;
        $event->task->save();
        return redirect()->route('tasks.index');

    }
}
