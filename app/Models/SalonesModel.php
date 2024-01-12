<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonesModel extends Model
{
    use HasFactory;
  protected  $table='salones';
protected $fillable=['nivel','grade','section','users_id'];
public $timestamps = false;
// En el modelo Salon
// En el modelo SalonesModel
// En el modelo SalonesModel
public function docente()
{
    return $this->belongsTo(User::class, 'users_id');
}


public function alumnos() {
    return $this->hasMany(AlumnosModel::class, 'salon_id');
}



}
