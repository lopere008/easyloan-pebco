<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DemandePret extends Model
{
    protected $fillable = ['compte_id', 'offre_pret_id', 'montant', 'duree', 'statut'];

    public function compte(): BelongsTo
    {
        return $this->belongsTo(Compte::class);
    }

    public function pieces(): HasMany
    {
        return $this->hasMany(PieceJustificative::class);
    }

    public function observations(): HasMany
    {
        return $this->hasMany(Observation::class);
    }

    public function decision(): HasOne
    {
        return $this->hasOne(Decision::class);
    }
}

