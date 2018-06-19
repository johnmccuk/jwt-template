<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => \App\Events\RecordSaved::class,
    ];

    public function audit_logs()
    {
        return $this->morphMany('App\AuditLog', 'auditable');
    }
}
