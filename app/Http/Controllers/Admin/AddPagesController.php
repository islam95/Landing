<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddPagesController extends Controller
{
    public function execute(Request $request)
    {
        if (view()->exists('admin.pages_add')){

            $data = [
                'title' => 'New page',
            ];

            return view('admin.pages_add', $data);
        }

        abort(404);
    }
}
