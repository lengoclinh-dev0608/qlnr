<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellSnack extends Model
{
    use HasFactory;
    protected $table = 'phieuxuat';
    protected $fillable = [
        'STTPHIEUXUAT',
        'LUARAN_ID',
        'NV_ID',
        'NGAYBAN',
    ];

    public function nhanvien()
    {
        return $this->hasOne(Worker::class, 'NV_ID', 'NV_ID');
    }

    public function luaran()
    {
        return $this->hasOne(Snack::class, 'LUARAN_ID', 'LUARAN_ID');
    }
}
