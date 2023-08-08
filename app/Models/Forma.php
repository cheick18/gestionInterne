<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Forma extends Model
{
    use HasFactory;
    public function inscrits(): HasMany
    {
        return $this->hasMany(Inscription::class);
    }
}
