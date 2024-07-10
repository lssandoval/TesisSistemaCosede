<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $table = 'mantenimientos'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_mantenimiento'; // Clave primaria de la tabla

    // Aquí puedes especificar los campos que puedes rellenar
    protected $fillable = [
        'id_nuevat',
        'tipo_mantenimiento',
        'observacion_mantenimiento',
        'recomendacion_mantenimiento',
        'fecha_mantenimiento',
        'tecnico_mantenimiento'
    ];

    // Relación con el modelo Nuevat
    public function nuevat()
    {
        return $this->belongsTo(Nuevat::class, 'id_nuevat', 'id');
    }
}
