<?php

declare(strict_types=1);

namespace App\Domains\Task;

use App\Domains\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int id
 * @property string title
 * @property string description
 * @property boolean status
 * @property Carbon created_at
 * @property Carbon updated_at
 */

class Task extends Model {

    const TABLE = 'tasks';
    protected $table = self::TABLE;

    protected $casts = [
        'status' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'task_user',
            'task_id',
            'user_id'
        );
    }
}