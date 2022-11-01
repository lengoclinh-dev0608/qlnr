<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailImportFood extends Model
{
    use HasFactory;
    protected $table = 'ctpnta';
    protected $fillable = [
        'THUOC_ID',
        'STT_PNTA',
        'SOLUONG',
        'DONGIA',
    ];
}
