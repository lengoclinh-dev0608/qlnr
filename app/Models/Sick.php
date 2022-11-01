<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sick extends Model
{
    use HasFactory;
    protected $table = 'benh';
    protected $fillable = [
        'TEN_BENH',
        'TRIEU_CHUNG'
    ];
}
