<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
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

    public function test($id)
    {
        $this->data = Medicine::find($id);
        // $this->data['benh'] = $this->data->benh->TEN_BENH;
        // $benh = 
        // $data->getThuoc->TEN_BENH;

        return response()->json([
            'data' => $this->data
        ]);
    }
}
