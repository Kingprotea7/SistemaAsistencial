<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docenteModel extends Model
{
    use HasFactory;

    public function salones()
    {

        return $this->hasMany(Salon::class);

    }
protected $table='docentes';
    protected $fillable=['name','lastname','email','password'];
}
