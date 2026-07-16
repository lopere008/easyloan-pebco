<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OffrePret extends Model
{
    protected $fillable = ['nom', 'montant_min', 'montant_max', 'taux', 'duree_min', 'duree_max'];

    public function demandePrets(): HasMany
    {
        return $this->hasMany(DemandePret::class);
    }
}

