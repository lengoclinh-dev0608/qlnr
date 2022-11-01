<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sick;

class SickController extends Controller
{
    public $data = [];
    public function getSicks()
    {
        $this->data['sicks'] = Sick::all();
        return view('pages.admin.listSicks', $this->data);
    }
}
