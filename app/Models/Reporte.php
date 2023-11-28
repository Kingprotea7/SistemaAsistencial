<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $fillable = ['alumno_id', 'tipo_reporte', 'dia', 'semana', 'mes'];

// En el modelo Reporte.php
public function alumno()
{
    return $this->belongsTo(AlumnosModel::class, 'alumno_id');
}
public function reportes()
{
    return $this->hasMany(Reporte::class);
}

public function asistencia()
{
    return $this->hasOne(AsistenciaModel::class, 'alumno_id', 'alumno_id');
}
public function asistencias()
{
    return $this->hasMany(AsistenciaModel::class, 'alumno_id', 'alumno_id');
}


}
