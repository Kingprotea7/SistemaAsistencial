<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eventoModel extends Model
{
    use HasFactory;

protected $fillable=['event','semana','fecha'];

}
