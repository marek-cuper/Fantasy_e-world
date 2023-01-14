<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bosses extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'profile_path',
        'backg_path',
        'damage',
        'health',
        'wep_path',
        'scroll1_path',
        'scroll2_path',
        'scroll3_path',
    ];

    public $timestamps = false;
}
