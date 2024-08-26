<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApiTask extends Model
{
    use HasFactory;

    protected $fillable=['name','is_completed'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
