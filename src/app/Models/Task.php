<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tasks';
    /**
     * @var string[]
     */
    public $fillable = [
        'task_name',
        'completed_at'
    ];

    /**
     * @var string[]
     */
    public $casts = [
        'completed_at' => 'datetime'
    ];

    public function getIsCompletedAttribute(): bool
    {
        return !is_null($this->completed_at);
    }
}
