<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



    class AsistenciaModel extends Model
    {
        use HasFactory;
        protected $table = 'asistencias';

        protected $fillable = [
            'alumno_id',
            'salon_id','reporte_id',   // Agregamos el campo salon_id
            'fecha',
            'estado',
            'comentario',
            'tipo'
        ];

        public function alumno()
        {
            return $this->belongsTo(AlumnosModel::class, 'alumno_id');
        }

        public function salon()
        {
            return $this->belongsTo(SalonesModel::class, 'salon_id');
        }
        public function reporte()
        {
            return $this->belongsTo(Reporte::class, 'alumno_id');
        }
        public function asistencias()
        {
            return $this->hasMany(AsistenciaModel::class, 'alumno_id', 'alumno_id');
        }




}
