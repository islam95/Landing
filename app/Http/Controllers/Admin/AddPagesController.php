<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddPagesController extends Controller
{
    public function execute(Request $request)
    {
        if ($request->isMethod('post')){
            $input = $request->only('name', 'alias', 'content', 'images');

            $validator = Validator::make($input, [
                'name'      => 'required|max:255',
                'alias'     => 'required|unique:pages|max:255',
                'content'   => 'required',
            ]);

            if ($validator->fails()){
                return redirect()->route('addPages')->withErrors($validator)->withInput();
            }

            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img', $input['images']);
            }

            $page = new Page();
            $page->fill($input);

            if ($page->save()){
                return redirect('admin/pages')->with('status', 'Page was successfully added!');
            }
        }

        if (view()->exists('admin.pages_add')){

            $data = [
                'title' => 'New page',
            ];

            return view('admin.pages_add', $data);
        }

        abort(404);
    }
}
