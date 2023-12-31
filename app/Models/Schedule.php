<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'start',
        'end',
        'player_joined',
        'max_player',
    ];

    protected $dates = ['date', 'start', 'end'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'schedule_user_court', 'schedule_id', 'user_id');
    }

    public function courts(): BelongsToMany
    {
        return $this->belongsToMany(Court::class, 'schedule_user_court', 'schedule_id', 'court_id');
    }
}
