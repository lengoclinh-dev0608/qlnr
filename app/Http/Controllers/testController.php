<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    //
    public function test()
    {
        return view('pages/admin/index');
    }
    //

    public function listSnacks()
    {
        return view('pages/admin/listSnacks');
    }

    public function addSnack()
    {
        return view('pages/admin/addSnack');
    }

    // public function listMedicines()
    // {
    //     return view('pages/admin/listMedicines');
    // }

    public function listSicks()
    {
        return view('pages/admin/listSicks');
    }

    public function listSeeds()
    {
        return view('pages/admin/listSeeds');
    }
}
