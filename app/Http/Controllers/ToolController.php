<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tool;

class ToolController extends Controller
{
    public $data = [];
    public function index()
    {
        $this->data['getAll'] = Tool::all();
        return response()->json([
            'data' => $getAll
        ], 200);
    }
}
