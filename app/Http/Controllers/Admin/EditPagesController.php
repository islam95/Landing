<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EditPagesController extends Controller
{
    public function execute(Page $page, Request $request)
    {
        $old = $page->toArray();
        if (view()->exists('admin.pages_edit')){
            $data = [
                'title' => 'Editing page - '.$old['name'],
                'data' => $old
            ];

            return view('admin.pages_edit', $data);
        }
    }
}
