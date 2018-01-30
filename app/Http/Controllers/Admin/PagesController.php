<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function execute(){

        if (view()->exists('admin.pages')){
            $pages = Page::all();

            $data = [
                'title' => 'Pages',
                'pages' => $pages
            ];

            return view('admin.pages', $data);
        } else {
            abort(404);
        }
    }
}
