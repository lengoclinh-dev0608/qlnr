<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailImportFood;

class ImportFoodDetail extends Controller
{
    public $data = [];
    public function getDetailImportFoods()
    {
        $this->data['foods'] = DetailImportFood::all();
        return view('pages.admin.importFoods', $this->data);
    }
}
