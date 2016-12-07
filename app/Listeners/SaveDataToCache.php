<?php

namespace App\Listeners;

use App\Events\TaskSaved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveDataToCache
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
     * @param  PostSaved  $event
     * @return void
     */
    public function handle(TaskSaved $event)
    {
        $task = $event->task;
        $key = 'task_'.$task->name;
        \Cache::put($key, $task->user_id.$task->name, 60*24);

    }
}
