<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tricolor extends Model
{
    use HasFactory;

    protected $fillable = [
        'green',
        'red',
        'yellow',
    ];
}
