<?php

namespace App\Listeners;

use App\Events\ApprovalGrantedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Routing\Redirector;

class ApprovalGrantedListener
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
    public function handle(ApprovalGrantedEvent $event): Application|Redirector|RedirectResponse
    {
        $event->taskApprovalobj->approval_granted = true;
        $event->taskApprovalobj->save();
        return redirect()->to('approvals')->with('success', 'Task Approved Successfully');
    }
}
