<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Temporada extends Model
{
    protected $fillable = ['numero', 'estreia'];

    protected $casts = [
        'numero' => 'integer',
        'estreia' => 'date'
    ];

    public function episodios(): HasMany
    {
        return $this->hasMany(Episodio::class);
    }

    public function serie(): BelongsTo
    {
        return $this->belongsTo(Serie::class);
    }
}
