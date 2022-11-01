<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;


class MedicineController extends Controller
{
    public $data = [];
    public function getMedicines()
    {
        $this->data['medicines'] = Medicine::all();
        return view('pages.admin.listMedicines', $this->data);
    }
}
