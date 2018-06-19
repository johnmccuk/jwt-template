<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => \App\Events\RecordSaved::class,
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function audit_logs()
    {
        return $this->morphMany('App\AuditLog', 'auditable');
    }
}
