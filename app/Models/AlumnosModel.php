<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnosModel extends Model
{
    protected $table='alumnos';
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'num_padre',
        'nivel',
        'grado',
        'seccion',
        'asistencias',
        'tardanzas',
        'faltas'
    ];

    public function salon() {
        return $this->belongsTo(SalonesModel::class, 'salon_id');
    }
// En el modelo AlumnosModel

public function reportes()
{
    return $this->hasMany(Reporte::class, 'alumno_id');
}

public function nombreCompleto()
{
    return "{$this->nombre}";
}
public function apellido()
{
    return " {$this->apellido_paterno}";
}
public function lastname2()
{
    return " {$this->apellido_materno}";
}
public function asistencias()
{
    return $this->hasMany(AsistenciaModel::class, 'alumno_id');
}

}
