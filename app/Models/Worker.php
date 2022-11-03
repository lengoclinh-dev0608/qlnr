<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $table = 'nhanvien';
    protected $fillable = [
        'NV_ID',
        'NV_HO',
        'NV_TEN',
        'NV_TAIKHOAN',
        'NV_MATKHAU'
    ];
}
