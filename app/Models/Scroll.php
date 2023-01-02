<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'activation',
        'cost',
        'info',
        'image_path',
    ];
}
