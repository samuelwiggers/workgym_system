<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Instructor extends Model
{
    protected $fillable = ['name', 'email', 'phone'];

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }
}
