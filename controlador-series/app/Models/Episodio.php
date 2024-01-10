<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episodio extends Model
{

    protected $table = 'episodios';

    protected $fillable = [
        'numero',
        'nome',
        'estreia',
    ];


    protected $casts = [
        'numero' => 'integer',
        'estreia' => 'date'
    ];

    public function temporadas(): BelongsTo
    {
        return $this->belongsTo(Temporada::class);
    }
}
