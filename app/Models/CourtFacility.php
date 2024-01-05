<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourtFacility extends Model
{
    use HasFactory;

    protected $fillable = [
        'court_id',
        'facility_id'
    ];

    public function court(): BelongsTo
    {
        return $this->belongsTo(Court::class, 'court_id', 'id');
    }

    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class, 'facility_id', 'id');
    }
}
