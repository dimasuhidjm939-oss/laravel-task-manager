<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * Mass-assignable attributes.
     */
    protected $fillable = [
        'task_name',
        'description',
        'status',
        'due_date',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'due_date' => 'date',
    ];

    /**
     * Scope: only pending tasks.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'Pending');
    }

    /**
     * Scope: only completed tasks.
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'Completed');
    }
}
