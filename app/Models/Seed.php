<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seed extends Model
{
    use HasFactory;
    protected $table = 'pn_congiong';
    protected $fillable = [
        'LUARAN_ID',
        'NV_ID',
        'SOLUONG',
        'NGAY',
        'DONGIA'
    ];
}
