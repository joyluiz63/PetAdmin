<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pet_id', 'categoria', 'nome', 'dosagem', 'uso',
        'obs', 'aplicado', 'repetir'
    ];

    public function pets() : BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}
