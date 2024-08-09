<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TaskApproval extends Model
{
    use HasFactory;

    /**
     * @var mixed|string
     */
    protected $guarded=[];

    public function task(): HasMany
    {
        return $this->hasMany(Task::class);
    }
    public function tasks(): HasOne
    {
        return $this->hasOne(Task::class);
    }
}
