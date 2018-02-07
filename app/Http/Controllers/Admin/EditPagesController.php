<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EditPagesController extends Controller
{
    public function execute(Page $page, Request $request)
    {
        if ($request->isMethod('post')){

            $input = $request->except('_token');

            $validator = Validator::make($input, [
                'name'      => 'required|max:255',
                'alias'     => 'required|max:255|unique:pages,alias,' . $input['id'],
                'content'   => 'required',
            ]);

            if ($validator->fails()){
                return redirect()
                    ->route('editPages', ['page'=>$input['id']])
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $file->move(public_path().'/assets/img', $file->getClientOriginalName());
                $input['images'] = $file->getClientOriginalName();
            } else {
                $input['images'] = $input['old_images'];
            }

            unset($input['old_images']);

            $page->fill($input);

            if ($page->update()){
                return redirect('admin/pages')->with('status', 'Page was successfully updated!');
            }

        }

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
