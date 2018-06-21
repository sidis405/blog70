<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // protected $table = 'task';
    // protected $primaryKey = 'la_chiave_primaria123';

    // Scopes // Scoped Queries
    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);
    }

    public function scopeCompleted($query)
    {
        return $query->where('completed', 1);
    }
}
