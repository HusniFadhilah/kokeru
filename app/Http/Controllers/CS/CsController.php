<?php

namespace App\Http\Controllers\CS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CsController extends Controller
{
    public function index(Request $request)
    {
        return view('cs.index');
    }
}
