<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Formations extends Model
{
    use HasFactory;
    public function categorie(): BelongsTo{
        return $this->belongsTo(Categories::class);
    }
}
