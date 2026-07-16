<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PieceJustificative extends Model
{
    protected $fillable = ['demande_pret_id', 'type', 'chemin_fichier'];

    public function demandePret(): BelongsTo
    {
        return $this->belongsTo(DemandePret::class);
    }
}