<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailImportMedicine;

class ImportMedicineDetail extends Controller
{
    public $data = [];
    public function getDetailImportMedicines()
    {
        $this->data['medicines'] = DetailImportMedicine::all();
        return view('pages.admin.importMedicines', $this->data);
    }
}
