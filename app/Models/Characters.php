<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characters extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'name',
        'level',
        'picture',
        'weapon',
        'scroll1',
        'scroll2',
        'scroll3',

    ];
}
