<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_level', 'user_id', 'position_id');
    }
}
