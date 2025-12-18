<?php

namespace App\Models;

use App\TaskPriorityEnum;
use App\TaskStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property TaskPriorityEnum $priority
 * @property TaskStatusEnum $status
 * @property Carbon|null $completed_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'priority' => 'int',
        'status' => 'int',
        'completed_at' => 'string',
    ];

    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
    ];
}
