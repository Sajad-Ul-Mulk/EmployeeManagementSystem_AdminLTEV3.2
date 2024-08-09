<?php

namespace App\Jobs;

use App\Mail\TaskCreatedMail;
use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $task;
    public function __construct(public Task $taskObj)
    {
        $this->task=$taskObj;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        Mail::to($this->task->user->email)->send(new TaskCreatedMail($this->task));
    }
}
