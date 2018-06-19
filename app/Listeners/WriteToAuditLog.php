<?php

namespace App\Listeners;

use App\Events\RecordSaved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WriteToAuditLog
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
     * @param  RecordSaved  $event
     * @return void
     */
    public function handle(RecordSaved $event)
    {
       dd($event);
    }
}
