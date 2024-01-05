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
        'user_id',
        'court_id'
    ];

    protected $dates = ['date', 'start', 'end'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function court(): BelongsTo
    {
        return $this->belongsTo(Court::class, 'court_id', 'id');
    }
}
