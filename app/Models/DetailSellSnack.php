<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tool;
use App\Models\ImportTool;
use App\Models\Worker;

class DetailSellSnack extends Model
{
    use HasFactory;
    protected $table = 'chitietpx';
    protected $fillable = [
        'HTB_ID',
        'NV_ID',
        'STTPHIEUXUAT',
        'SOLUONG',
        'DONGIA',
    ];

    public function phieuxuat()
    {
        return $this->hasOne(SellSnack::class, 'STTPHIEUXUAT', 'STTPHIEUXUAT');
    }

    public function nhanvien()
    {
        return $this->hasOne(Worker::class, 'NV_ID', 'NV_ID');
    }

    public function hinhthucban()
    {
        return $this->hasOne(SellType::class, 'HTB_ID', 'HTB_ID');
    }
}
