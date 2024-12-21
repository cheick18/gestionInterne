<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inscription extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
      public function certification():BelongsTo{
        return $this->belongsTo(listCertif::class);

      }
    public function allpymentbyinscrit():HasMany{
        return $this->hasMany(Paiement::class);

    }
    public function payment():BelongsTo{
        return $this->belongsTo(Paiement::class);

    }
    public function master():BelongsTo{
        return $this->belongsTo(Master::class);

    }
    public function licence():BelongsTo{
        return $this->belongsTo(Lp::class);

    }
    public function stage():BelongsTo{
        return $this->belongsTo(Stage::class);

    }
    public function forma():BelongsTo{
        return $this->belongsTo(Forma::class);

    }
    public function allformations():BelongsToMany{
        return $this->belongsToMany(Formations::class);

    }
}
