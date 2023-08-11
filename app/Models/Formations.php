<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Formations extends Model
{
    use HasFactory;
    public function categorie(): BelongsTo{
        return $this->belongsTo(Categories::class);
    }

    public function allinscrit(): BelongsToMany{
        return $this->belongsToMany(Inscription::class);

    }
    public function allpymentbyinscrit():HasMany{
        return $this->hasMany(Paiement::class);

    }

}
