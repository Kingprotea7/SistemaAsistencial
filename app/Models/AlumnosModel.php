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
    ];
    public function salon() {
        return $this->belongsTo(SalonModel::class, 'salon_id');
    }

}
