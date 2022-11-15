<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailSellSnack;

class SellSnackDetail extends Controller
{
    public $data = [];
    public function getDetailSellSnacks()
    {
        $this->data['receipts'] = DetailSellSnack::all();
        return view('pages.admin.receipts', $this->data);
    }
}
