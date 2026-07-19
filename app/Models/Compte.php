<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Compte extends Model

{
    protected $fillable = ['user_id', 'code', 'date_ouverture'];
    protected $casts = ['date_ouverture' => 'date'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function demandePrets(): HasMany
    {
        return $this->hasMany(DemandePret::class);
    }

    public function anciennete(): int
    {
        return $this->date_ouverture->diffInMonths(now());
    }

    public function estActif(): bool
    {
        return $this->transactions()->exists();
    }

    public function estEligible(): bool
    {
        return $this->anciennete() >= 1 && $this->estActif();
    }

    public static function genererCode(): string
    {
        do {
            $code = strtoupper(Str::random(8));
        } while (self::where('code', $code)->exists());

        return $code;
    }
}

