<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Seed;

class SeedController extends Controller
{
    public $data = [];
    public function getSeeds()
    {
        $this->data['seeds'] = Seed::all();
        return view('pages.admin.listSeeds', $this->data);
    }
}
