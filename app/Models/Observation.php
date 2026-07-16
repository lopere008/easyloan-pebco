<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    protected $fillable = ['demande_pret_id', 'user_id', 'contenu'];

    public function demandePret(): BelongsTo
    {
        return $this->belongsTo(DemandePret::class);
    }

    public function auteur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}