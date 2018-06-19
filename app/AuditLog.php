<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    /**
     * Get all of the owning commentable models.
     */
    public function auditable()
    {
        return $this->morphTo();
    }
}
