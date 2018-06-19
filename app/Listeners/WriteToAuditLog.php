<?php

namespace App\Listeners;

use App\Events\RecordSaved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use App\AuditLog;

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
    public function handle(RecordSaved $recordSaved)
    {
       if (!$recordSaved->event->isDirty()) {
           return;
       }

       $updatedFields = $recordSaved->event->getDirty();

       $ignoreFields = ['id', 'password', 'updated_at', 'created_at'];

       foreach($updatedFields as $key => $value)
       {
            if (in_array($key, $ignoreFields)) {
                continue;
            }

            $this->SaveAuditRecord($recordSaved->event, $key);
       }

       return;
    }

    protected function SaveAuditRecord(\Illuminate\Database\Eloquent\Model $model, string $field)
    {
        $auditLog = new AuditLog;
        $auditLog->auditable_type = get_class($model);
        $auditLog->auditable_id = $model->id;
        $auditLog->field = $field;
        $auditLog->before = $model->getOriginal($field);
        $auditLog->after = $model->$field;
        $auditLog->user_id = Auth::id();
        $auditLog->save();
    }
}
