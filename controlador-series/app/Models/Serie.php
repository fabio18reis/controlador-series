<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Serie extends Model
{
    protected $table = 'series';

    protected $fillable = [
        'nome'
    ];


    public function temporadas(): HasMany
    {
        return $this->hasMany(Temporada::class);
    }
}
