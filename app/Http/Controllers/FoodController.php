<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Food;
use App\Models\DetailImportFood;

class FoodController extends Controller
{
    public $data = [];
    public function getFoods()
    {
        $this->data['foods'] = DetailImportFood::all();
        return view('pages.admin.importFoods', $this->data);
    }
}
