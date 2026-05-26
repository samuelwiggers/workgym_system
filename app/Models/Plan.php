<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    protected $fillable = ['name', 'price', 'duration_months'];

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }
}
