<?php

namespace App\Http\Controllers\CS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create()
    {
        return view('cs.task.create');
    }

    public function store(Request $request)
    {
    }
}
