<?php

namespace App\Listeners;

use App\Events\TaskFinished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTaskNotif
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TaskFinished  $event
     * @return void
     */
    public function handle(TaskFinished $event)
    {
    }
}
