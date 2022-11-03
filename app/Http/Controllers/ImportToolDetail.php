<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailImportTool;

class ImportToolDetail extends Controller
{
    public $data = [];
    public function getDetailImportTools()
    {
        $this->data['tools'] = DetailImportTool::all();
        return view('pages.admin.importTools', $this->data);
    }
}
