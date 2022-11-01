<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Snack;

class SnackController extends Controller
{
    public $data = [];
    public function getSnacks()
    {
        $this->data['snacks'] = Snack::all();
        return view('pages.admin.listSnacks', $this->data);
    }
}
