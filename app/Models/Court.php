<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Court extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'price'
    ];

    public function facilities(): BelongsToMany {
        return $this->belongsToMany(Facility::class);
    }
}
