<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Paiement extends Model
{
    use HasFactory;
 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function certification():BelongsTo{
        return $this->belongsTo(Certification::class);
    }
    public function ins(): BelongsTo
    {
        return $this->belongsTo(Inscription::class);
    }
    public function inst(): BelongsTo
    {
        return $this->belongsTo(Formations::class);
    }
}
