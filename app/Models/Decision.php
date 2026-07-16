<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    protected $fillable = ['demande_pret_id', 'user_id', 'type_decision', 'commentaire'];

    public function demandePret(): BelongsTo
    {
        return $this->belongsTo(DemandePret::class);
    }

    public function auteur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}