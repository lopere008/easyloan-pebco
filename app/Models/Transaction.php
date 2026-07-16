<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['compte_id', 'type', 'montant'];
    public function compte(): BelongsTo
    {
        return $this->belongsTo(Compte::class);
    }
}
