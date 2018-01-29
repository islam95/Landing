<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;

class PageController extends Controller
{
    public function execute($alias){
        if (!$alias){
            abort(404);
        }

        if (view()->exists('front.page')){
            $page = Page::where('alias', strip_tags($alias))->first();

            $data = [
                'title' => $page->name,
                'page' => $page
            ];

            return view('front.page', $data);
        } else {
            abort(404);
        }

    }
}
