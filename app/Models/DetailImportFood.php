<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Food;
use App\Models\ImportFood;
use App\Models\Worker;

class DetailImportFood extends Model
{
    use HasFactory;
    protected $table = 'ctpnta';
    protected $fillable = [
        'THUCAN_ID',
        'STT_PNTA',
        'SOLUONG',
        'DONGIA',
    ];

    public function pnta()
    {
        return $this->hasOne(ImportFood::class, 'STT_PNTA', 'STT_PNTA');
    }

    public function thucan()
    {
        return $this->hasOne(Food::class, 'THUCAN_ID', 'THUCAN_ID');
    }
}
