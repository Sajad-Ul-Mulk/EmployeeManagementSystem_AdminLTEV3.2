<?php

namespace App\Observers;

use App\Jobs\SendMailJob;
use App\Mail\TaskAssignedMail;
use App\Mail\TaskCreatedMail;
use App\Models\Task;
use Illuminate\Support\Facades\Mail;

class TaskObserver
{
    /**
     * Handle the Task "created" event.
     * @param Task $task
     * @param $request
     */
    public $task;
    public function created(Task $taskobj): void
    {
        $this->task=$taskobj;
//        dd($task);
//        dd($task->user->email);
        $email=$this->task->user->email;
//        dd($email);
        SendMailJob::dispatch($this->task);

//        SendMailJob::dispatch($this->task);
//        Mail::to($email)->send(new TaskCreatedMail($task));

//        Mail::to(users: $email)->send(new TaskAssignedMail($this->task));
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $taskobj): void
    {
        $this->task=$taskobj;
//        dd($task);
//        dd($task->user->email);
        $email=$this->task->user->email;
//        dd($email);
        SendMailJob::dispatch($this->task);
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
