<?php

namespace App\Http\Controllers\CS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CsController extends Controller
{
    public function index(Request $request)
    {
        return view('cs.index');
    }
}
