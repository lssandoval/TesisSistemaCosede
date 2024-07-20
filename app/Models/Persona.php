<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'distributivo.persona';
    protected $primaryKey = 'per_id';
    protected $connection = 'pgsql2';

    protected $fillable = ['per_unidad'];

    public function areas(): BelongsToMany
    {
        return $this->belongsToMany(Area::class, 'distributivo.persona_area', 'per_id', 'are_id');
    }

    public function getUnidadAttribute()
    {
        return $this->attributes['per_unidad'];
    }
}
