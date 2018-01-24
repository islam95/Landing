<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
        return view('layouts.main');
    }
}
