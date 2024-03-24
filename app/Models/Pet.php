<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome', 'especie', 'raca', 'cor', 'sexo', 'nascimento', 'tutor', 'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function petPhotos() : HasMany
    {
        return $this->hasMany(PetPhoto::class);
    }

    public function vacinas(): HasMany
    {
        return $this->hasMany(Vacina::class);
    }

    public function consultas(): HasMany
    {
        return $this->hasMany(Consulta::class);
    }

    public function medicamentos(): HasMany
    {
        return $this->hasMany(Pet::class);
    }
}

