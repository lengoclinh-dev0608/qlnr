<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;
use App\Models\ImportMedicine;
use App\Models\Worker;

class DetailImportMedicine extends Model
{
    use HasFactory;
    protected $table = 'ctpnt';
    protected $fillable = [
        'THUOC_ID',
        'STT_PNT',
        'SOLUONG',
        'DONGIA',
    ];

    public function pnt()
    {
        return $this->hasOne(ImportMedicine::class, 'STT_PNT', 'STT_PNT');
    }

    public function thuoc()
    {
        return $this->hasOne(Medicine::class, 'THUOC_ID', 'THUOC_ID');
    }
}
