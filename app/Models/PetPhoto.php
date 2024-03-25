<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetPhoto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pet_id', 'image'
    ];

    public function pets() : BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}
