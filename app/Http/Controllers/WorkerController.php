<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Worker;

class WorkerController extends Controller
{
    public $data = [];
    public function getWorkers()
    {
        $this->data['workers'] = Worker::all();
        // $this->data['workers'] = worker::with(relations: 'Snack')->get();
        return view('pages.admin.manager', $this->data);
    }
}
