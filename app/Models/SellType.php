<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellType extends Model
{
    use HasFactory;
    protected $table = 'hinhthucban';
    protected $fillable = [
        'HTB_ID',
        'HTB_TEN',
        'HTB_GHICHU',
    ];
}
