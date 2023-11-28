<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    use HasFactory;
    protected $fillable = ['is_online'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
public function markAsOnline()
{
    $this->update(['is_online' => true]);
}
}
