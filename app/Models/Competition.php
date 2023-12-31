<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'organizer',
        'start_date',
        'end_date',
        'max_team',
        'rules',
    ];

    protected $dates = ['start_date', 'end_date'];

    public function court(): BelongsTo{
        return $this->belongsTo(Court::class);
    }
}
