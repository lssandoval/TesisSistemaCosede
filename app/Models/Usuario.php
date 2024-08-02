<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'login.usuario';
    protected $primaryKey = 'per_id';
    protected $connection = 'pgsql2';

    protected $fillable = ['est_id'];

    // Define la relación inversa con el modelo Persona
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'per_id', 'per_id');
    }

    public function getCedulaAttribute()
    {
        return $this->persona ? $this->persona->per_cedula : null;
    }
}
