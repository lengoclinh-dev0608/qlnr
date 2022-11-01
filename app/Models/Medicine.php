<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $table = 'thuoc';
    protected $fillable = [
        'BENH_ID',
        'TENTHUOC',
        'HUONGDAN'
    ];
}
