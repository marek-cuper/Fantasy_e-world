<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'info',
        'image_path',
        'playable',
    ];

    public $timestamps = false;
}
