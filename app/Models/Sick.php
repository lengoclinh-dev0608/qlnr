<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;

class Sick extends Model
{
    use HasFactory;
    protected $table = 'benh';
    protected $primaryKey = 'BENH_ID';
    protected $fillable = [
        'BENH_ID',
        'TEN_BENH',
        'TRIEU_CHUNG'
    ];
}
