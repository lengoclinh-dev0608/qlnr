<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportFood extends Model
{
    use HasFactory;
    protected $table = 'pn_thucan';
    protected $fillable = [
        'STT_PNTA',
        'LUARAN_ID',
        'NV_ID',
        'NGAYNHAP',
    ];

    public function nhanvien()
    {
        return $this->hasOne(Worker::class, 'NV_ID', 'NV_ID');
    }
}
