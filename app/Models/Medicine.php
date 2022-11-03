<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sick;

class Medicine extends Model
{
    use HasFactory;
    protected $table = 'thuoc';
    protected $primaryKey = 'THUOC_ID';
    protected $fillable = [
        'BENH_ID',
        'TENTHUOC',
        'HUONGDAN'
    ];

    public function benh()
    {
        return $this->hasOne(Sick::class, 'BENH_ID', 'BENH_ID');
    }
}
