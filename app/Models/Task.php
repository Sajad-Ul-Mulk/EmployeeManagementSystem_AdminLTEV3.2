<?php

namespace App\Models;

use App\Observers\TaskObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


#[ObservedBy(TaskObserver::class)]
class Task extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function approval(): HasOne
    {
        return $this->HasOne(TaskApproval::class);
    }

    public function scopeTaskToDo(Builder $query): void
    {
      $query->where('task_approval_id', '<', 1);
    }
    public function scopeApproved(Builder $query): void
    {
        $query->where('task_approval_id', '>', 0);
    }
}
