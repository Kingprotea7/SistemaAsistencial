<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonesModel extends Model
{
    use HasFactory;
  protected  $table='salones';
protected $fillable=['name','grade','section'];
public $timestamps = false;

}
