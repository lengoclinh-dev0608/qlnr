<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tool;
use App\Models\ImportTool;
use App\Models\Worker;

class DetailImportTool extends Model
{
    use HasFactory;
    protected $table = 'ctpncc';
    protected $fillable = [
        'CONGCU_ID',
        'STT_PNCC',
        'SOLUONG',
        'DONGIA',
    ];

    public function pncc()
    {
        return $this->hasOne(ImportTool::class, 'STT_PNCC', 'STT_PNCC');
    }

    public function congcu()
    {
        return $this->hasOne(Tool::class, 'CONGCU_ID', 'CONGCU_ID');
    }
}
