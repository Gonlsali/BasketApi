<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function courts(): HasMany
    {
        return $this->hasMany(CourtFacility::class, 'court_id', 'id');
    }
}
