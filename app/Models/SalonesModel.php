<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonesModel extends Model
{
    use HasFactory;
  protected  $table='salones';
protected $fillable=['nivel','grade','section','docente_id'];
public $timestamps = false;
public function docente()
{
    return $this->belongsTo(DocenteModel::class);
}

public function alumnos() {
    return $this->hasMany(AlumnosModel::class, 'salon_id');
}



}
