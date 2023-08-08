<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Formations extends Model
{
    use HasFactory;
    public function categorie(): BelongsTo{
        return $this->belongsTo(Categories::class);
    }

    public function allinscrit(): BelongsToMany{
        return $this->belongsToMany(Inscription::class);

    }
}
