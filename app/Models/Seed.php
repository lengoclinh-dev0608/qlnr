<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Worker;

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
    public function nhanvien()
    {
        return $this->hasOne(Worker::class, 'NV_ID', 'NV_ID');
    }
}
