<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
        'review',
        'user_id',
        'court_id',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'schedule_user_court', 'schedule_id', 'user_id');
    }

    public function courts(): BelongsToMany
    {
        return $this->belongsTo(Court::class, 'schedule_user_court', 'schedule_id', 'court_id');
    }
}
