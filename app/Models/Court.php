<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Court extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'price'
    ];

    public function facilities()
    {
        return $this->hasMany(CourtFacility::class, 'facility_id', 'id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class,'court_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class,'court_id', 'id');
    }

    public function competitions()
    {
        return $this->hasMany(Student::class,'court_id', 'id');
    }
}
