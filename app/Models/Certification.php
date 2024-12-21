<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Certification extends Model
{
    use HasFactory;
    /*
    public function inscrits(): HasMany
    {
        return $this->hasMany(Inscription::class);
    }
    public function pay():HasMany{
        return $this->hasMany(Paiement::class);
    }*/

}
